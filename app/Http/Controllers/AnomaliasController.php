<?php

namespace App\Http\Controllers;

use App\Http\Requests\Anomalias\AnomaliasStore;
use App\Http\Requests\Anomalias\AnomaliasUpdate;
use App\Models\Anomalias;
use App\Models\Problemas;
use App\Models\Sensores;
use App\Models\Vigilancias;
use Illuminate\Support\Facades\Auth;

class AnomaliasController extends Controller
{
    public function create(Sensores $sensor, Vigilancias $vigilancia){
        $problemas = Problemas::all();
        return view('Anomalias.crear', compact(['sensor', 'vigilancia', 'problemas']));
    }

    public function store(AnomaliasStore $request){
        $anomalia = new Anomalias();
        $anomalia->fill($request->all());
        $anomalia->save();

        return redirect()->route('home');
    }

    public function iniciarTrabajos(Anomalias $anomalia){
        $anomalia->users_id = Auth::user()->id;
        $anomalia->inicio = now();
        $anomalia->save();

        return redirect()->route('home');
    }

    public function edit(Anomalias $anomalia){
        $soluciones = $anomalia->problemas->soluciones;
        return view('Anomalias.editar', compact(['anomalia', 'soluciones']));
    }

    public function update(AnomaliasUpdate $request, Anomalias $anomalia){
        $anomalia->fill($request->all());
        $anomalia->fin = now();
        $anomalia->save();

        return redirect()->route('home');
    }
}
