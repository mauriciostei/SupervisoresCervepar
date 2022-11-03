<?php

namespace App\Http\Requests\Sectores;

use Illuminate\Foundation\Http\FormRequest;

class SectoresUpdate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nombre' => 'required|string|max:40|unique:sectores,nombre,'.$this->sector->id,
            'centros_id' => 'required|exists:centros,id',
            'perfiles_id' => 'required|exists:perfiles,id',
        ];
    }
}
