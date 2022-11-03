<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'perfiles_id',
        'sectores_id',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getVigilanciaActualAttribute(){
        return $this->vigilancias->whereNull('fin')->first();
    }

    public function permisos($permiso){
        return $this->perfiles->permisos->where('nombre', $permiso)->first()->pivot;
    }

    public function perfiles(){
        return $this->belongsTo(Perfiles::class);
    }

    public function sectores(){
        return $this->belongsToMany(Sectores::class, 'sectores_users', 'users_id', 'sectores_id');
    }

    public function vigilancias(){
        return $this->hasMany(Vigilancias::class, 'users_id');
    }
}
