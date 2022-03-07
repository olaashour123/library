<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditUserRequest extends FormRequest
{

    public function rules()
    {
        $userId = request('id');

        return [
            'username' => [
                'required',
                'max:255',
                Rule::unique('users', 'username')->ignore($userId)
            ],
            'name' => [
                'required',
                'max:255'
            ],
            'email' => [
                'required',
                'email',
                'max:128',
                Rule::unique('users', 'email')->ignore($userId)
            ],
            'status' => [
                'required',
                Rule::in([0,1])
            ]
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
