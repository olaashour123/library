<?php

namespace App\Http\Requests\Admin;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class ChangePassRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $rules = [
          'current_password' => [
               'current_password:customer',
                    'required',
                    'max:255'
         ],

          'New_Password' => [
               'required',
                'confirmed',
                // 'required_with:password_confirmation',

          ],
            'New_Password_confirmation' => [
                'required',
                // 'between:3,64',
                //  'confirmed'
            ],


        ];


           return $rules;
    }



}
