<?php

namespace App\Http\Requests\Admin;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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

       'quantity'=> [
                    'required',




            ],


        'book_id' => [
                'required',
                'numeric',

            ],



        ];

           return $rules;
    }


}
