<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sensores extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'codigo', 'sectores_id'];

    public function sectores(){
        return $this->belongsTo(Sectores::class);
    }

    public function anomalias(){
        return $this->belongsToMany(Anomalias::class);
    }
}
