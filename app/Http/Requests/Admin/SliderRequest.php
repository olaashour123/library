<?php

namespace App\Http\Requests\Admin;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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

        'title' => [
                    'required',
                    'max:255'
            ],



        'image' => [
                 'required',
                 'image',
                 // 'mimes:jbg,bmp,png',

                ],

        'description' => [
                        'nullable',
                        'max:255'
               ],
        'status'=>[
                    'nullable',

               ],

        'url'=>[
                    'nullable',

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
