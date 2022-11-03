<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vigilancias extends Model
{
    use HasFactory;

    public function anomalias(){
        return $this->hasMany(Anomalias::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }
}
