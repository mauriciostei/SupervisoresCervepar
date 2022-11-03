<?php

namespace App\Http\Requests\Perfiles;

use Illuminate\Foundation\Http\FormRequest;

class PerfilesStore extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:40|unique:centros,nombre',
            'permisos' => 'required|array',
            'permisos.*' => 'required|exists:permisos,id',
            'permisos.*.ver' => 'nullable|bool',
            'permisos.*.crear' => 'nullable|bool',
            'permisos.*.editar' => 'nullable|bool'
        ];
    }
}
