<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function users(){
        return $this->hasMany(User::class);
    }

    public function sectores(){
        return $this->hasMany(Sectores::class);
    }

    public function permisos(){
        return $this->belongsToMany(Permisos::class)->withPivot(['ver', 'crear', 'editar']);
    }
}
