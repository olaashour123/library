<?php

namespace App\Http\Requests\Admin;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutRequest extends FormRequest
{
  public function authorize()
    {
        return true;
    }



      public function rules()
    {

        $rules = [
            'first_name' => [
                    'required',
               ],

            'last_name' =>[
                'required'
              ],

            'email' =>[
                  'required',
                 'email'
              ],

            'phone' => [
                'required',
              ],

            'address' => [
                'required',
             ],
            'city' => [
                'required',
             ],
            'postcode' =>[
                 'required',
             ],


        //    'country' => [
        //        'required'
        //        ]


        ];

           return $rules;
    }


}



