<?php

namespace App\View\Components\Graph;

use App\Models\Anomalias;
use App\Models\Sectores;
use App\Models\Sensores;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;

class MayoresIncidencias extends Component
{
    public $labels = [];
    public $cantidades = [];

    public function __construct()
    {
        $user = User::find(Auth::user()->id);
        $sectores = $user->sectores->where('perfiles_id', $user->perfiles_id)->pluck('id')->toArray();

        $allData = [];
        foreach($sectores as $line):
            $nombre = Sectores::find($line)->nombre;
            $sensores_id = Sensores::where('sectores_id', $line)->pluck('id')->toArray();
            $cantidad = Anomalias::Select(DB::raw('count(*) as total'))->whereIn('sensores_id',  $sensores_id )->whereDate('created_at', date('Y-m-d'))->first();
            array_push($allData, ['nombre' => $nombre, 'cantidad' => $cantidad->total]);
        endforeach;

        usort($allData, function ($item1, $item2) {
            return $item2['cantidad'] <=> $item1['cantidad'];
        });

        $largo = count($allData) >= 2 ? 2 : count($allData);
        $largo--;

        for($i=0; $i<=$largo; $i++){
            array_push($this->labels, $allData[$i]['nombre']);
            array_push($this->cantidades, $allData[$i]['cantidad']);
        }
    }

    public function render()
    {
        return view('components.graph.mayores-incidencias');
    }
}
