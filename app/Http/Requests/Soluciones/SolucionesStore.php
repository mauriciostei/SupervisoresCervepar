<?php

namespace App\Http\Requests\Soluciones;

use Illuminate\Foundation\Http\FormRequest;

class SolucionesStore extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:120|unique:soluciones,nombre',
            'problemas' => 'nullable|array',
            'problemas.*' => 'exists:problemas,id',
        ];
    }
}
