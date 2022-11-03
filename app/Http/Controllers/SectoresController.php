<?php

namespace App\Http\Controllers;

use App\Http\Requests\Sectores\SectoresStore;
use App\Http\Requests\Sectores\SectoresUpdate;
use App\Models\Centros;
use App\Models\Perfiles;
use App\Models\Sectores;

class SectoresController extends Controller
{
    public function index(){
        $sectores = Sectores::orderBy('id', 'desc')->paginate(10);
        return view('Sectores.lista', compact('sectores'));
    }

    public function create(){
        $centros = Centros::all();
        $perfiles = Perfiles::all();
        return view('Sectores.crear', compact(['centros', 'perfiles']));
    }

    public function store(SectoresStore $request){
        $sector = new Sectores();
        $sector->fill($request->all());
        $sector->save();

        return redirect()->route('sectores.index');
    }

    public function show(Sectores $sector){
        return view('Sectores.mostrar', compact('sector'));
    }

    public function edit(Sectores $sector){
        $centros = Centros::all();
        $perfiles = Perfiles::all();
        return view('Sectores.editar', compact(['sector', 'centros', 'perfiles']));
    }

    public function update(SectoresUpdate $request, Sectores $sector){
        $sector->fill($request->all());
        $sector->save();

        return redirect()->route('sectores.index');
    }
}
