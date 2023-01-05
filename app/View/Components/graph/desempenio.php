<?php

namespace App\View\Components\Graph;

use App\Models\Anomalias;
use App\Models\Sensores;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class Desempenio extends Component
{
    public $terminado = 0;

    public function __construct()
    {
        $user = User::find(Auth::user()->id);
        $sectores = $user->sectores->where('perfiles_id', $user->perfiles_id)->pluck('id')->toArray();
        $sensores_id = Sensores::whereIn('sectores_id', $sectores)->pluck('id')->toArray();
        $datos = Anomalias::Select(DB::raw('count(*) as total'), DB::raw('count(fin) as terminado'))->whereIn('sensores_id',  $sensores_id )->whereDate('created_at', date('Y-m-d'))->first();

        $this->terminado = $datos->terminado==0 || $datos->total==0 ? 0 : 100 * ($datos->terminado/$datos->total);
        $this->terminado = round($this->terminado, 0);
    }

    public function render()
    {
        return view('components.graph.desempenio');
    }
}
