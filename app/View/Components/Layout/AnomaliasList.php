<?php

namespace App\View\Components\Layout;

use App\Models\Anomalias;
use App\Models\Sensores;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AnomaliasList extends Component
{
    public $alertas;

    public function __construct()
    {
        $user = User::find(Auth::user()->id);
        $sectores = $user->sectores->where('perfiles_id', $user->perfiles_id)->pluck('id')->toArray();
        $sensores_id = Sensores::whereIn('sectores_id', $sectores)->pluck('id')->toArray();
        $this->alertas = Anomalias::orderBy('id', 'desc')->whereNull('fin')->whereIn('sensores_id',  $sensores_id )->paginate(5);
    }

    public function render()
    {
        return view('components.layout.anomalias-list');
    }
}
