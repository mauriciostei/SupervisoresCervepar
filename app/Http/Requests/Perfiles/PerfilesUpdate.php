<?php

namespace App\Http\Requests\Perfiles;

use Illuminate\Foundation\Http\FormRequest;

class PerfilesUpdate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:40|unique:centros,nombre,'.$this->perfil->id,
            'permisos' => 'required|array',
            'permisos.*' => 'required|exists:permisos,id',
            'permisos.*.ver' => 'nullable|bool',
            'permisos.*.crear' => 'nullable|bool',
            'permisos.*.editar' => 'nullable|bool'
        ];
    }
}
