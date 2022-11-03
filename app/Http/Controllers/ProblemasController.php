<?php

namespace App\Http\Controllers;

use App\Http\Requests\Problemas\ProblemasStore;
use App\Http\Requests\Problemas\ProblemasUpdate;
use App\Models\Problemas;
use App\Models\Soluciones;

class ProblemasController extends Controller
{
    public function index(){
        $problemas = Problemas::orderBy('id', 'desc')->paginate(10);
        return view('Problemas.lista', compact('problemas'));
    }

    public function create(){
        $soluciones = Soluciones::all();
        return view('Problemas.crear', compact('soluciones'));
    }

    public function store(ProblemasStore $request){
        $problema = new Problemas();
        $problema->fill($request->all());
        $problema->save();
        $problema->soluciones()->attach($request->soluciones);

        return redirect()->route('problemas.index');
    }

    public function show(Problemas $problema){
        return view('Problemas.mostrar', compact('problema'));
    }

    public function edit(Problemas $problema){
        $soluciones = Soluciones::all();
        return view('Problemas.editar', compact(['problema', 'soluciones']));
    }

    public function update(ProblemasUpdate $request, Problemas $problema){
        $problema->fill($request->all());
        $problema->save();

        $problema->soluciones()->sync($request->soluciones);

        return redirect()->route('problemas.index');
    }
}
