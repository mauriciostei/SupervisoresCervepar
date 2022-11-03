<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Models\User' => 'App\Policies\UsersPolicy',
        App\Models\Perfiles::class => App\Policies\PerfilesPolicy::class,
        App\Models\Centros::class => App\Policies\CentrosPolicy::class,
        App\Models\Sectores::class => App\Policies\SectoresPolicy::class,
        App\Models\Sensores::class => App\Policies\SensoresPolicy::class,
        App\Models\Problemas::class => App\Policies\ProblemasPolicy::class,
        App\Models\Soluciones::class => App\Policies\SolucionesPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
