<?php

namespace App\Policies\users;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Log;

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

    public function before($user, $ability)
    {
        return $user->isAdmin();
    }

    public function edit(User $authUser, User $user)
    {
        return $authUser->id == $user->id;
    }

    public function destroy(User $authUser, User $user)
    {
        return $authUser->id == $user->id;
    }
}
