<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
{

    public function rules()
    {
        return [
            'password' => 'required|between:3,64|confirmed',
            'password_confirmation' => 'required|between:3,64'
        ];
    }

    public function attributes()
    {
        return [
            'password' => trans('password'),
            'password_confirmation' => trans('password_confirmation'),
        ];
    }

    public function authorize()
    {
        return true;
    }

}
