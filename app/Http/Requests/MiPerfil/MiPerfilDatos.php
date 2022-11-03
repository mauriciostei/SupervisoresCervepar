<?php

namespace App\Http\Requests\MiPerfil;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MiPerfilDatos extends FormRequest
{
    public function authorize()
    {
        return $this->user->id == Auth::user()->id;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:5',
            'email' => 'required|email|min:5|unique:users,email,'.$this->user->id,
            'avatar' => 'nullable|image|max:10240',
        ];
    }
}
