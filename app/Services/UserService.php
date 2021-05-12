<?php


namespace App\Services;


use App\Models\User;

/**
 * Class UserService
 * @package App\Services
 *
 * @property-read User $users
 */
class UserService
{
    private $users;

    public function __construct(User $users)
    {
        $this->users = $users;
    }

    public function syncUserData(object $userData, User $user = null)
    {
        if ($user == null) {
            $user = $user ?? $this->users;
            $userData->deleted_at = time();
        }
        $user->fill([
//            'pin' => $userData->pin,
//            'passport' => $userData->pport_no,
//            'username' => $userData->user_id,
//            'surname' => $userData->sur_name,
//            'name' => $userData->first_name,
//            'middle_name' => $userData->mid_name,
//            'deleted_at' => $userData->deleted_at ?? null
            'username' => $userData->user_id,
            'first_name' => $userData->first_name,
            'last_name' => $userData->sur_name,
            'email' => $userData->email,
        ]);

        $user->save();
    }


}
