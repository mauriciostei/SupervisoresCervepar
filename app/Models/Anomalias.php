<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anomalias extends Model
{
    use HasFactory;

    protected $table = 'anomalias';

    protected $fillable = ['sensores_id', 'users_id', 'problemas_id', 'soluciones_id', 'vigilancias_id', 'observaciones'];

    public function sensores(){
        return $this->belongsTo(Sensores::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

    public function problemas(){
        return $this->belongsTo(Problemas::class);
    }

    public function soluciones(){
        return $this->belongsTo(Soluciones::class);
    }

    public function vigilancias(){
        return $this->belongsTo(Vigilancias::class);
    }
}
