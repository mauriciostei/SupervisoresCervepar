<?php

namespace App\Http\Requests\MiPerfil;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class MiPerfilPass extends FormRequest
{
    public function authorize()
    {
        return $this->user->id == Auth::user()->id;
    }

    public function rules()
    {
        return [
            'actual' => 'required|string|current_password',
            'nuevo' => 'required|string|min:5',
            'confirmacion' => 'required|string|min:5|same:nuevo',
        ];
    }
}
