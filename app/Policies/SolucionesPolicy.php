<?php

namespace App\Policies;

use App\Models\Soluciones;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SolucionesPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->permisos('soluciones')->ver;
    }

    public function view(User $user, Soluciones $soluciones)
    {
        return $user->permisos('soluciones')->ver;
    }

    public function create(User $user)
    {
        return $user->permisos('soluciones')->crear;
    }

    public function update(User $user, Soluciones $soluciones)
    {
        return $user->permisos('soluciones')->editar;
    }

}
