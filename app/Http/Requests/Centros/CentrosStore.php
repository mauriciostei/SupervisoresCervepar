<?php

namespace App\Http\Requests\Centros;

use Illuminate\Foundation\Http\FormRequest;

class CentrosStore extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:40|unique:centros,nombre',
            'siglas' => 'required|string|max:20|unique:centros,siglas',
        ];
    }
}
