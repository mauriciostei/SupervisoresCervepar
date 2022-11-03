<?php

namespace App\Http\Requests\Anomalias;

use Illuminate\Foundation\Http\FormRequest;

class AnomaliasStore extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'sensores_id' => 'required|exists:sensores,id',
            'vigilancias_id' => 'required|exists:vigilancias,id',
            'problemas_id' => 'required|exists:problemas,id',
            'observaciones' => 'nullable|max:300',
        ];
    }
}
