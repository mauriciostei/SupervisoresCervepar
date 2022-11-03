<?php

namespace App\Http\Controllers;

use App\Http\Requests\Perfiles\PerfilesStore;
use App\Http\Requests\Perfiles\PerfilesUpdate;
use App\Http\Traits\CheckBoxPermisos;
use App\Models\Perfiles;
use App\Models\Permisos;

class PerfilesController extends Controller
{
    use CheckBoxPermisos;

    public function index(){
        $perfiles = Perfiles::orderBy('id', 'desc')->paginate(10);
        return view('Perfiles.lista', compact('perfiles'));
    }

    public function create(){
        $permisos = Permisos::all();
        return view('Perfiles.crear', compact('permisos'));
    }

    public function store(PerfilesStore $request){
        $perfil = new Perfiles();
        $perfil->fill($request->all());
        $perfil->save();
        
        $permisos = $this->RequestToPermisos($request->permisos);
        $perfil->permisos()->attach($permisos);

        return redirect()->route('perfiles.index');
    }

    public function show(Perfiles $perfil){
        return view('Perfiles.mostrar', compact('perfil'));
    }

    public function edit(Perfiles $perfil){
        $permisos = Permisos::all();
        return view('Perfiles.editar', compact(['perfil', 'permisos']));
    }

    public function update(PerfilesUpdate $request, Perfiles $perfil){
        $perfil->fill($request->all());
        $perfil->save();

        $permisos = $this->RequestToPermisos($request->permisos);
        $perfil->permisos()->sync($permisos);

        return redirect()->route('perfiles.index');
    }
}
