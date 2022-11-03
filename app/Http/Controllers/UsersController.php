<?php

namespace App\Http\Controllers;

use App\Http\Requests\Users\UsersStore;
use App\Http\Requests\Users\UsersUpdate;
use App\Models\Perfiles;
use App\Models\Sectores;
use App\Models\User;

class UsersController extends Controller
{
    public function index(){
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('Users.lista', compact('users'));
    }

    public function create(){
        $perfiles = Perfiles::all();
        $sectores = Sectores::all();
        return view('Users.crear', compact(['perfiles', 'sectores']));
    }

    public function store(UsersStore $request){
        $user = new User();
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        $user->sectores()->attach($request->sectores);

        return redirect()->route('users.index');
    }

    public function show(User $user){
        return view('Users.mostrar', compact('user'));
    }

    public function edit(User $user){
        $perfiles = Perfiles::all();
        $sectores = Sectores::all();
        return view('Users.editar', compact('user', 'perfiles', 'sectores'));
    }

    public function update(UsersUpdate $request, User $user){
        $user->fill($request->all());
        $user->save();
        $user->sectores()->sync($request->sectores);

        return redirect()->route('users.index');
    }
}
