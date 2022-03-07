<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
{

    public function rules()
    {
        return [
            'username' => [
                'required',
                'max:255',
                Rule::unique('users', 'username'),
            ],
            'name' => [
                'required',
                'max:255'
            ],
            'email' => [
                'required',
                'max:64',
                Rule::unique('users', 'email')
            ],
            'password' => [
                'required',
                'between:3,64',
                'confirmed'
            ],
            'password_confirmation' => [
                'required',
                'between:3,64'
            ],
            'status' => [
                'required',
                Rule::in(0,1)
            ]
        ];
    }

    public function all($keys = null): array
    {
        return parent::all();
    }

    public function authorize()
    {
        return true;
    }
}
