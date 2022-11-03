<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginForm(){
        return view('App.login');
    }

    public function login(Request $request){
        $val = $request->validate([
            'email' => 'required|email|min:5',
            'password' => 'required|string|min:5',
        ]);

        if(!Auth::attempt($val)){
            return back()->withErrors(['email' => 'Usuario o contraseña inválidos']);
        }

        session()->regenerate();
        return redirect()->route('home');
    }

    public function logout(){
        Auth::logout();
        session()->regenerate();
        return redirect()->route('login');
    }
}
