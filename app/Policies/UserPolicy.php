<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function adminSuperadmin(User $user)
    {
        if ($user->role == 'admin' || $user->role == 'superadmin') {
            return true;
        } else {
            return false;
        }
    }

    public function superAdmin(User $user)
    {
        if ($user->role == 'superadmin') {
            return true;
        } else {
            return false;
        }
    }
}
