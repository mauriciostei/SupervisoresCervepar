<?php

namespace App\View\Components\layout;

use App\Models\Anomalias as ModelsAnomalias;
use App\Models\Sensores;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class Anomalias extends Component
{
    public $alertas;

    public function __construct()
    {
        $user = User::find(Auth::user()->id);
        $sectores = $user->sectores->where('perfiles_id', $user->perfiles_id)->pluck('id')->toArray();
        $sensores_id = Sensores::whereIn('sectores_id', $sectores)->pluck('id')->toArray();
        $this->alertas = ModelsAnomalias::orderBy('id', 'desc')->whereNull('fin')->whereIn('sensores_id',  $sensores_id )->paginate(10);
    }

    public function render()
    {
        return view('components.layout.anomalias');
    }
}
