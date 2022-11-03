<?php

namespace App\Policies;

use App\Models\Perfiles;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PerfilesPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->permisos('perfiles')->ver;
    }

    public function view(User $user, Perfiles $perfiles)
    {
        return $user->permisos('perfiles')->ver;
    }

    public function create(User $user)
    {
        return $user->permisos('perfiles')->crear;
    }

    public function update(User $user, Perfiles $perfiles)
    {
        return $user->permisos('perfiles')->editar;
    }
}
