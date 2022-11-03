<?php

namespace App\Http\Requests\Sectores;

use Illuminate\Foundation\Http\FormRequest;

class SectoresStore extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:40|unique:sectores,nombre',
            'centros_id' => 'required|exists:centros,id',
            'perfiles_id' => 'required|exists:perfiles,id',
        ];
    }
}
