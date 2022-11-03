<?php

namespace App\Policies;

use App\Models\Centros;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CentrosPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->permisos('centros')->ver;
    }

    public function view(User $user, Centros $centros)
    {
        return $user->permisos('centros')->ver;
    }

    public function create(User $user)
    {
        return $user->permisos('centros')->crear;
    }

    public function update(User $user, Centros $centros)
    {
        return $user->permisos('centros')->editar;
    }
}
