<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sensores\SensoresStore;
use App\Http\Requests\Sensores\SensoresUpdate;
use App\Models\Sectores;
use App\Models\Sensores;

class SensoresController extends Controller
{
    public function index(){
        $sensores = Sensores::orderBy('id', 'desc')->paginate(10);
        return view('Sensores.lista', compact('sensores'));
    }

    public function create(){
        $sectores = Sectores::all();
        return view('Sensores.crear', compact(['sectores']));
    }

    public function store(SensoresStore $request){
        $sensor = new Sensores();
        $sensor->fill($request->all());
        $sensor->save();

        return redirect()->route('sensores.index');
    }

    public function show(Sensores $sensor){
        return view('Sensores.mostrar', compact('sensor'));
    }

    public function edit(Sensores $sensor){
        $sectores = Sectores::all();
        return view('Sensores.editar', compact(['sensor', 'sectores']));
    }

    public function update(SensoresUpdate $request, Sensores $sensor){
        $sensor->fill($request->all());
        $sensor->save();

        return redirect()->route('sensores.index');
    }
}
