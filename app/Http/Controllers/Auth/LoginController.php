<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\LoginCodeRequest;
use App\Services\AuthService;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class LoginController
 * @package App\Http\Controllers\Auth
 *
 * @author Enver Menadjiev <enver1323@gmail.com>
 *
 * @property AuthService $authService
 */
class LoginController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function authenticate(Request $request)
    {
        return redirect($this->authService->getLoginRedirectQueryURL());
    }

    public function govCallback(LoginCodeRequest $request): RedirectResponse
    {
        try {
            $userData = $this->authService->processCallback($request);
            return $this->authService->loginViaGov($userData);
        } catch (Exception $exception) {
            return redirect()->route('dashboard')->with('error', $exception->getMessage());
        }

    }

    public function logout(): RedirectResponse
    {
        $this->authService->logoutUser();

        return redirect()->route('admin');
    }


}
