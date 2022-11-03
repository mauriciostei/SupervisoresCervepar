<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sectores extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'centros_id', 'perfiles_id'];

    public function centros(){
        return $this->belongsTo(Centros::class);
    }

    public function sensores(){
        return $this->hasMany(Sectores::class);
    }

    public function perfiles(){
        return $this->belongsTo(Perfiles::class);
    }

    public function users(){
        return $this->belongsToMany(User::class);
    }
}
