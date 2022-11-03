<?php

namespace App\Policies;

use App\Models\Sensores;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SensoresPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->permisos('sensores')->ver;
    }

    public function view(User $user, Sensores $sesores)
    {
        return $user->permisos('sensores')->ver;
    }

    public function create(User $user)
    {
        return $user->permisos('sensores')->crear;
    }

    public function update(User $user, Sensores $sesores)
    {
        return $user->permisos('sensores')->editar;
    }
}
