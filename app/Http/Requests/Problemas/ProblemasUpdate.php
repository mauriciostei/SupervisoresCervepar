<?php

namespace App\Http\Requests\Problemas;

use Illuminate\Foundation\Http\FormRequest;

class ProblemasUpdate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:120|unique:problemas,nombre,'.$this->problema->id,
            'soluciones' => 'nullable|array',
            'soluciones.*' => 'exists:soluciones,id',
        ];
    }
}
