<?php

namespace App\Http\Requests\Sensores;

use Illuminate\Foundation\Http\FormRequest;

class SensoresUpdate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:40|unique:sensores,nombre,'.$this->sensor->id,
            'codigo' => 'required|string|max:40|unique:sensores,codigo,'.$this->sensor->id,
            'sectores_id' => 'required|exists:sectores,id',
        ];
    }
}
