<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsersPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->permisos('users')->ver;
    }

    public function view(User $user, User $model)
    {
        return $user->permisos('users')->ver;
    }

    public function create(User $user)
    {
        return $user->permisos('users')->crear;
    }

    public function update(User $user, User $model)
    {
        return $user->permisos('users')->editar;
    }
}
