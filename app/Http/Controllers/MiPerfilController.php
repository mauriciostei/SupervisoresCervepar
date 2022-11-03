<?php

namespace App\Http\Controllers;

use App\Http\Requests\MiPerfil\MiPerfilDatos;
use App\Http\Requests\MiPerfil\MiPerfilPass;
use App\Models\User;

class MiPerfilController extends Controller
{
    public function show(User $user){
        return view('App.perfil', compact('user'));
    }

    public function actualizarDatos(MiPerfilDatos $request, User $user){
        $user->fill($request->all());

        if($request->file('avatar')->isValid()){
            $user->avatar = $request->avatar->store('img/avatars', 'real_public');
        }

        $user->save();

        return redirect()->route('miPerfil.show', $user->id);
    }

    public function actualizarPass(MiPerfilPass $request, User $user){
        $user->password = bcrypt($request->nuevo);
        $user->save();

        return redirect()->route('miPerfil.show', $user->id);
    }
}
