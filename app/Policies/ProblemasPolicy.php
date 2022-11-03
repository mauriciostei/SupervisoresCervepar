<?php

namespace App\Policies;

use App\Models\Problemas;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProblemasPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return $user->permisos('problemas')->ver;
    }

    public function view(User $user, Problemas $problemas)
    {
        return $user->permisos('problemas')->ver;
    }

    public function create(User $user)
    {
        return $user->permisos('problemas')->crear;
    }

    public function update(User $user, Problemas $problemas)
    {
        return $user->permisos('problemas')->editar;
    }
}
