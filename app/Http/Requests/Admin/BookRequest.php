<?php

namespace App\Http\Requests\Admin;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class  BookRequest extends FormRequest
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


        $id=request('id');

        $rules = [

        'name' => [
                    'required',
                    'max:255'
            ],

        'quantity'=> [
                    'required',

            ],

        'price'=>[
                'required',
                'numeric',

            ],

    //   'category_id' => ['required',
    //         'int',
    //         'exists:categories',
    //         'id',

    //     ],
        'image' => [
                 'required',
                 'image',
                 // 'mimes:jbg,bmp,png',

                ],

        'description' => [
                        'nullable',
                        'max:255'
               ],

        'publishers' => [
                'required',
                // 'array'
            ],

        'publishers.*' => [
                'numeric'
            ],
            'publisher_id' => [
                'nullable',
            ],

            'categories' => [
                'required',
                'array'
            ],

           'categories.*' => [
                'numeric'
            ],

            'authors' => [
                'required',
                'array'
            ],

           'authors.*' => [
                'numeric'
            ],



        ];

         if(!is_null($id)){

            $rules['image']= [

                'nullable',
                'image',
            ];

        }

           return $rules;
    }


}
