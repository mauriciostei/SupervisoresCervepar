<?php

namespace App\Http\Controllers;

use App\Http\Requests\Soluciones\SolucionesStore;
use App\Http\Requests\Soluciones\SolucionesUpdate;
use App\Models\Problemas;
use App\Models\Soluciones;

class SolucionesController extends Controller
{
    public function index(){
        $soluciones = Soluciones::orderBy('id', 'desc')->paginate(10);
        return view('Soluciones.lista', compact('soluciones'));
    }

    public function create(){
        $problemas = Problemas::all();
        return view('Soluciones.crear', compact('problemas'));
    }

    public function store(SolucionesStore $request){
        $solucion = new Soluciones();
        $solucion->fill($request->all());
        $solucion->save();
        $solucion->problemas()->attach($request->problemas);

        return redirect()->route('soluciones.index');
    }

    public function show(Soluciones $solucion){
        return view('Soluciones.mostrar', compact('solucion'));
    }

    public function edit(Soluciones $solucion){
        $problemas = Problemas::all();
        return view('Soluciones.editar', compact(['solucion', 'problemas']));
    }

    public function update(SolucionesUpdate $request, Soluciones $solucion){
        $solucion->fill($request->all());
        $solucion->save();
        $solucion->problemas()->sync($request->problemas);

        return redirect()->route('soluciones.index');
    }
}
