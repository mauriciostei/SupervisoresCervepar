<?php

namespace App\Http\Controllers;

use App\Http\Requests\Centros\CentrosStore;
use App\Http\Requests\Centros\CentrosUpdate;
use App\Models\Centros;

class CentrosController extends Controller
{
    public function index(){
        $centros = Centros::orderBy('id', 'desc')->paginate(10);
        return view('Centros.lista', compact('centros'));
    }

    public function create(){
        return view('Centros.crear');
    }

    public function store(CentrosStore $request){
        $centro = new Centros();
        $centro->fill($request->all());
        $centro->save();

        return redirect()->route('centros.index');
    }

    public function show(Centros $centro){
        return view('Centros.mostrar', compact('centro'));
    }

    public function edit(Centros $centro){
        return view('Centros.editar', compact('centro'));
    }

    public function update(CentrosUpdate $request, Centros $centro){
        $centro->fill($request->all());
        $centro->save();

        return redirect()->route('centros.index');
    }
}
