<?php

namespace App\Http\Requests\Sensores;

use Illuminate\Foundation\Http\FormRequest;

class SensoresStore extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:40|unique:sensores,nombre',
            'codigo' => 'required|string|max:40|unique:sensores,codigo',
            'sectores_id' => 'required|exists:sectores,id',
        ];
    }
}
