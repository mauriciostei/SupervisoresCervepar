<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soluciones extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function anomalias(){
        return $this->hasMany(Anomalias::class);
    }

    public function problemas(){
        return $this->belongsToMany(Problemas::class);
    }
}
