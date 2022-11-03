<?php

use App\Http\Controllers\AnomaliasController;
use App\Http\Controllers\CentrosController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MiPerfilController;
use App\Http\Controllers\PerfilesController;
use App\Http\Controllers\ProblemasController;
use App\Http\Controllers\SectoresController;
use App\Http\Controllers\SensoresController;
use App\Http\Controllers\SolucionesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VigilanciasController;
use Illuminate\Support\Facades\Route;

// Accesos para usuarios no iniciados
Route::middleware('guest')->group(function(){
    Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('tryLogin');
});

// Solo usuarios que iniciaros el sistema pueden acceder
Route::middleware('auth')->group(function(){

    // Cerrar sistema
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    // Controlar mi perfil
    Route::prefix('/miPerfil')->group(function(){
        Route::get('/{user}', [MiPerfilController::class, 'show'])->name('miPerfil.show');
        Route::put('/{user}/actualizar', [MiPerfilController::class, 'actualizarDatos'])->name('miPerfil.actualizar');
        Route::put('/{user}/password', [MiPerfilController::class, 'actualizarPass'])->name('miPerfil.password');
    });

    // Pagina de Home
    Route::get('/', [VigilanciasController::class, 'home'])->name('home');

    // Control de vigilancias
    Route::get('/iniciarVigilancia', [VigilanciasController::class, 'iniciarVigilancia'])->name('iniciarVigilancia');
    Route::get('/finalizarVigilancia/{vigilancia}', [VigilanciasController::class, 'finalizarVigilancia'])->name('finalizarVigilancia');

    // Control de anomalías
    Route::prefix('/anomalias')->group(function(){
        Route::get('/create/{sensor}/{vigilancia}', [AnomaliasController::class, 'create'])->name('anomalias.create');
        Route::post('/store', [AnomaliasController::class, 'store'])->name('anomalias.store');
        Route::get('/{anomalia}/edit', [AnomaliasController::class, 'edit'])->name('anomalias.edit');
        Route::put('/{anomalia}/update', [AnomaliasController::class, 'update'])->name('anomalias.update');

        Route::get('/{anomalia}/iniciar', [AnomaliasController::class, 'iniciarTrabajos'])->name('anomalias.iniciar');
    });

    // CRUD Perfiles
    Route::prefix('/Perfiles')->group(function(){
        Route::get('/', [PerfilesController::class, 'index'])->name('perfiles.index')->middleware('can:viewAny,App\Models\Perfiles');
        Route::get('/create', [PerfilesController::class, 'create'])->name('perfiles.create')->middleware('can:create,App\Models\Perfiles');
        Route::post('/store', [PerfilesController::class, 'store'])->name('perfiles.store')->middleware('can:create,App\Models\Perfiles');
        Route::get('/{perfil}', [PerfilesController::class, 'show'])->name('perfiles.show')->middleware('can:view,perfil');
        Route::get('/{perfil}/edit', [PerfilesController::class, 'edit'])->name('perfiles.edit')->middleware('can:update,perfil');
        Route::put('/{perfil}/update', [PerfilesController::class, 'update'])->name('perfiles.update')->middleware('can:update,perfil');
    });

    // CRUD Usuarios
    Route::prefix('/users')->group(function(){
        Route::get('/', [UsersController::class, 'index'])->name('users.index')->middleware('can:viewAny,App\Models\Users');
        Route::get('/create', [UsersController::class, 'create'])->name('users.create')->middleware('can:create,App\Models\Users');
        Route::post('/store', [UsersController::class, 'store'])->name('users.store')->middleware('can:create,App\Models\Users');
        Route::get('/{user}', [UsersController::class, 'show'])->name('users.show')->middleware('can:view,user');
        Route::get('/{user}/edit', [UsersController::class, 'edit'])->name('users.edit')->middleware('can:update,user');
        Route::put('/{user}/update', [UsersController::class, 'update'])->name('users.update')->middleware('can:update,user');
    });

    // CRUD Centros
    Route::prefix('/centros')->group(function(){
        Route::get('/', [CentrosController::class, 'index'])->name('centros.index')->middleware('can:viewAny,App\Models\Centros');
        Route::get('/create', [CentrosController::class, 'create'])->name('centros.create')->middleware('can:create,App\Models\Centros');
        Route::post('/store', [CentrosController::class, 'store'])->name('centros.store')->middleware('can:create,App\Models\Centros');
        Route::get('/{centro}', [CentrosController::class, 'show'])->name('centros.show')->middleware('can:view,centro');
        Route::get('/{centro}/edit', [CentrosController::class, 'edit'])->name('centros.edit')->middleware('can:update,centro');
        Route::put('/{centro}/update', [CentrosController::class, 'update'])->name('centros.update')->middleware('can:update,centro');
    });

    // CRUD Sectores
    Route::prefix('/sectores')->group(function(){
        Route::get('/', [SectoresController::class, 'index'])->name('sectores.index')->middleware('can:viewAny,App\Models\Sectores');
        Route::get('/create', [SectoresController::class, 'create'])->name('sectores.create')->middleware('can:create,App\Models\Sectores');
        Route::post('/store', [SectoresController::class, 'store'])->name('sectores.store')->middleware('can:create,App\Models\Sectores');
        Route::get('/{sector}', [SectoresController::class, 'show'])->name('sectores.show')->middleware('can:view,sector');
        Route::get('/{sector}/edit', [SectoresController::class, 'edit'])->name('sectores.edit')->middleware('can:update,sector');
        Route::put('/{sector}/update', [SectoresController::class, 'update'])->name('sectores.update')->middleware('can:update,sector');
    });

    // CRUD Sensores
    Route::prefix('/sensores')->group(function(){
        Route::get('/', [SensoresController::class, 'index'])->name('sensores.index')->middleware('can:viewAny,App\Models\Sensores');
        Route::get('/create', [SensoresController::class, 'create'])->name('sensores.create')->middleware('can:create,App\Models\Sensores');
        Route::post('/store', [SensoresController::class, 'store'])->name('sensores.store')->middleware('can:create,App\Models\Sensores');
        Route::get('/{sensor}', [SensoresController::class, 'show'])->name('sensores.show')->middleware('can:view,sensor');
        Route::get('/{sensor}/edit', [SensoresController::class, 'edit'])->name('sensores.edit')->middleware('can:update,sensor');
        Route::put('/{sensor}/update', [SensoresController::class, 'update'])->name('sensores.update')->middleware('can:update,sensor');;
    });

    // CRUD Problemas
    Route::prefix('/problemas')->group(function(){
        Route::get('/', [ProblemasController::class, 'index'])->name('problemas.index')->middleware('can:viewAny,App\Models\Problemas');
        Route::get('/create', [ProblemasController::class, 'create'])->name('problemas.create')->middleware('can:create,App\Models\Problemas');
        Route::post('/store', [ProblemasController::class, 'store'])->name('problemas.store')->middleware('can:create,App\Models\Problemas');
        Route::get('/{problema}', [ProblemasController::class, 'show'])->name('problemas.show')->middleware('can:view,problema');
        Route::get('/{problema}/edit', [ProblemasController::class, 'edit'])->name('problemas.edit')->middleware('can:update,problema');
        Route::put('/{problema}/update', [ProblemasController::class, 'update'])->name('problemas.update')->middleware('can:update,problema');
    });

    // CRUD Soluciones
    Route::prefix('/soluciones')->group(function(){
        Route::get('/', [SolucionesController::class, 'index'])->name('soluciones.index')->middleware('can:viewAny,App\Models\Soluciones');
        Route::get('/create', [SolucionesController::class, 'create'])->name('soluciones.create')->middleware('can:create,App\Models\Soluciones');
        Route::post('/store', [SolucionesController::class, 'store'])->name('soluciones.store')->middleware('can:create,App\Models\Soluciones');
        Route::get('/{solucion}', [SolucionesController::class, 'show'])->name('soluciones.show')->middleware('can:view,solucion');
        Route::get('/{solucion}/edit', [SolucionesController::class, 'edit'])->name('soluciones.edit')->middleware('can:update,solucion');
        Route::put('/{solucion}/update', [SolucionesController::class, 'update'])->name('soluciones.update')->middleware('can:update,solucion');
    });
    
});