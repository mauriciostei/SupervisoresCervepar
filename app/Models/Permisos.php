<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    use HasFactory;

    public function perfiles(){
        return $this->belongsToMany(Perfiles::class)->withPivot(['ver', 'crear', 'editar']);
    }
}
