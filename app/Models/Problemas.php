<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Problemas extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function anomalias(){
        return $this->hasMany(Anomalias::class);
    }

    public function soluciones(){
        return $this->belongsToMany(Soluciones::class);
    }
}
