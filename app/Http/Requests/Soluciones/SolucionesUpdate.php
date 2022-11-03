<?php

namespace App\Http\Requests\Soluciones;

use Illuminate\Foundation\Http\FormRequest;

class SolucionesUpdate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:80|unique:soluciones,nombre,'.$this->solucion->id,
            'problemas' => 'nullable|array',
            'problemas.*' => 'exists:problemas,id',
        ];
    }
}
