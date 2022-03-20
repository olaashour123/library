<?php

namespace App\Http\Requests\Admin\Auth;

use Illuminate\Foundation\Http\FormRequest;

class CustomRequest extends FormRequest
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
        return [

            'email' => 'required|email',
            'password' => 'required|between:3,64',
            // 'status'   => 'required|numeric|in:1',
            //
        ];
    }
    public function all($keys = null)

    {
          $data= parent::all();
          $data['status']=1;
          return $data;
    }



     public function attributes()
    {
        return [
            'username' => trans('username'),
            'password' => trans('password'),
        ];
    }

}

