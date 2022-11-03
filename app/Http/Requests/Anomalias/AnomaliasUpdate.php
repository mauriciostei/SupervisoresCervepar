<?php

namespace App\Http\Requests\Anomalias;

use Illuminate\Foundation\Http\FormRequest;

class AnomaliasUpdate extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'soluciones_id' => 'required|exists:soluciones,id',
            'observaciones' => 'nullable|max:300',
        ];
    }
}
