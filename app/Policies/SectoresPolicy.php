<?php

namespace App\Policies;

use App\Models\Sectores;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SectoresPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->permisos('sectores')->ver;
    }

    public function view(User $user, Sectores $sectores)
    {
        return $user->permisos('sectores')->ver;
    }

    public function create(User $user)
    {
        return $user->permisos('sectores')->crear;
    }

    public function update(User $user, Sectores $sectores)
    {
        return $user->permisos('sectores')->editar;
    }
}
