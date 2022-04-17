<?php

namespace App\Http\Requests\Admin;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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

        // $id=request('id');

        $rules = [

             'first_name' => [
                    'required',
               ],

            'last_name' =>[
                'required'
              ],

            'email' =>[
                  'required',
                 'email',
                 'unique:customers',
              ],

               'password' => [
                'required',
                'between:3,64',
                
                // 'confirmed'
            ],

            'confirm_password' => [
                  'required',
              'same:password',
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

           'country_id' => [
              'required',
                'numeric',
            ],

        //     'image' => [
        //                'required',
        //              'image',
        // //                 // 'mimes:
        //      ],


        // 'name' => [
        //             'required',
        //             'max:255'
        //     ],
        // 'email' => [
        //         'required',
        //         'max:64',
        //         Rule::unique('customers', 'email')
        //     ],
        // 'password' => [
        //         'required',
        //         'between:3,64',
        //         // 'confirmed'
        //     ],

        // 'address' => [
        //         'required',
        //     ],

        // 'image' => [
        //                 'required',
        //                 'image',
        //                 // 'mimes:jbg,bmp,png',

        //         ],


        // 'publishers' => [
        //         'required',
        //         'array'
        //     ],

        // 'publishers.*' => [
        //         'numeric'
        //     ],

        ];

        //  if(!is_null($id)){

        //     $rules['image']= [

        //         'nullable',
        //         'image',
        //     ];

      //  }

           return $rules;
    }


}
