<?php

namespace App\Http\Controllers;

use App\Models\Sensores;
use App\Models\User;
use App\Models\Vigilancias;
use Illuminate\Support\Facades\Auth;

class VigilanciasController extends Controller
{
    public function home(){
        $user = User::find(Auth::user()->id);
        $sectores = $user->sectores->where('perfiles_id', $user->perfiles_id)->pluck('id')->toArray();
        $sensores = Sensores::whereIn('sectores_id', $sectores)->get();

        return view('App.home', compact(['user', 'sensores']));
    }

    public function iniciarVigilancia(){
        $vigilancia = new Vigilancias();
        $vigilancia->users_id = Auth::user()->id;
        $vigilancia->inicio = now();
        $vigilancia->save();

        return redirect()->route('home');
    }

    public function finalizarVigilancia(Vigilancias $vigilancia){
        $vigilancia->fin = now();
        $vigilancia->save();

        Auth::logout();
        session()->regenerate();

        return redirect()->route('login');
    }
}
