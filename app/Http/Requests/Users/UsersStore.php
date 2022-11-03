<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;

class UsersStore extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:4',
            'email' => 'required|email|min:5|unique:users,email',
            'password' => 'required|string|min:5',
            'perfiles_id' => 'required|exists:perfiles,id',
            'sectores' => 'nullable|array',
            'sectores.*' => 'exists:sectores,id'
        ];
    }
}
