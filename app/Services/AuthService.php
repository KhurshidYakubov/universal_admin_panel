<?php


namespace App\Services;


use App\Models\User;
use App\Http\Requests\LoginCodeRequest;
use Exception;
use GuzzleHttp\Client;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

/**
 * Class AuthService
 * @package App\Domain\User\Services
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property User $users
 * @property Client $client
 * @property UserService $userService
 */
class AuthService
{
    private $users;
    private $client;
    private $userService;

    const SCOPES = [
        'sso' => 'http://sso.egov.uz/sso',
        'myGov' => 'test.epmty.uz',
        'my2Gov' => 'test.epmty.uz',
        'legal' => 'legal'
    ];

    const GRANT_TYPES = [
        'authCode' => 'one_authorization_code',
        'tokenIdentify' => 'one_access_token_identify'
    ];

    public function __construct(Client $client, User $users, UserService $userService)
    {
        $this->users = $users;
        $this->client = $client;
        $this->userService = $userService;
    }

    public function getLoginRedirectQueryURL(): string
    {
        $params = http_build_query([
            'client_id' => env('AUTH_CLIENT_ID'),
            'redirect_uri' => route('login.callback'),
            'response_type' => 'one_code',
            'scope' => self::SCOPES['myGov'],
            'state' => Str::random(32),
        ]);

        return env('AUTH_URL') . "?$params";
    }

    /**
     * @param LoginCodeRequest $request
     * @return object
     * @throws Exception
     */
    public function processCallback(LoginCodeRequest $request): object
    {
        $token = $this->getAccessToken($request->code);
        return $this->getUserData($token);
    }

    /**
     * @param $code
     * @return string
     * @throws Exception
     */
    private function getAccessToken($code): string
    {
        $token = $this->client->post(env('AUTH_TOKEN_URL'), [
            'form_params' => [
                'grant_type' => self::GRANT_TYPES['authCode'],
                'client_id' => env('AUTH_CLIENT_ID'),
                'client_secret' => env('AUTH_CLIENT_SECRET'),
                'redirect_uri' => route('login.callback'),
                'scope' => self::SCOPES['sso'],
                'code' => $code,
            ],
        ]);


        $response = json_decode($token->getBody()->getContents());

        if (isset($response->error))
            throw new Exception("$response->error: $response->error_description");
        return $response->access_token;
    }

    /**
     * @param string $token
     * @return object
     * @throws Exception
     */
    private function getUserData(string $token): object
    {
        $userInfo = $this->client->post(env('AUTH_USER_DATA_URL'), [
            'form_params' => [
                'grant_type' => self::GRANT_TYPES['tokenIdentify'],
                'client_id' => env('AUTH_CLIENT_ID'),
                'client_secret' => env('AUTH_CLIENT_SECRET'),
                'scope' => self::SCOPES['myGov'],
                'redirect_uri' => '',
                'access_token' => $token,
            ]
        ]);


        $response = json_decode($userInfo->getBody()->getContents(), true);

        if (isset($response->error))
            throw new Exception("$response->error: $response->error_description");

        return (object)$response;
    }

    /**
     * @param object $userData
     * @return RedirectResponse
     * @throws Exception
     */
    public function loginViaGov(object $userData): RedirectResponse
    {
        /** @var User|null $user */
        $user = $this->users->where('username', $userData->user_id)->first();
        if($user == null){
            $this->userService->syncUserData($userData);
            throw new Exception(__('auth.failed'));
        }

        $this->userService->syncUserData($userData, $user);
        $this->loginUser($user);

        return redirect()->intended(route('app.home'));
    }

    public function loginUser(User $user): void
    {
        auth()->login($user);

        request()->session()->regenerate();
    }

    public function logoutUser(): void
    {
        $session = request()->session();

        $this->guard()->logout();

        $session->regenerateToken();
    }

    public function guard(): StatefulGuard
    {
        return Auth::guard();
    }
}
