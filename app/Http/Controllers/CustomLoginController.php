<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Country;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\CustomerRequest;
use App\Http\Requests\Admin\Auth\CustomRequest;
use App\Repositories\front\CategoriesRepository;

class CustomLoginController extends Controller
{
    //


    public function index() {


        return view('front.custom.index');

        }


    public function doRegister(CategoriesRepository $CategoryRepo) {

       $categories=$CategoryRepo->getCategories(20);
          $countries = Country::all();


       return view('front.custom.register',['categories'=>$categories, 'countries'=>$countries]);
        }




    public function register(CustomerRequest $request)
       {

         $data = $request->validated();
         $data[('password')] =Hash::make($request->input('password'));
          $add = Customer::create($data);

        if (!$add) {
            $request->session()->flash('data', [
                'title' => 'Error',
                'code' => 400,
                'message' => 'Error While Adding'
            ]);
            return redirect()->route('admin.users.index');
        }

        $request->session()->flash('data', [
            'title' => 'success',
            'code' => 200,
            'message' => 'You have successfully registered'
        ]);
        return redirect()->route('front.custom.index');
        // $validator = Validator::make($request->all(), [
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     // 'phone'=>'required',
        //     // 'image'=>'nullable',
        //     'email' => 'required|email|unique:customers,email',   // required and email format validation
        //     'password' => 'required|min:8', // required and number field validation
        //     'confirm_password' => 'required|same:password',

        // ]); // create the validations
        // if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        // {

        //     return back()->withInput()->withErrors($validator);
        //     // validation failed redirect back to form

        // } else {
        //     //validations are passed, save new user in database
        //     $Customer = new Customer;
        //     $Customer->first_name = $request->first_name;
        //      $Customer->last_name = $request->last_name;
        //     $Customer->email = $request->email;
        //     $Customer->password = bcrypt($request->password);
        //     $Customer->save();

        //     return redirect("front.custom.index")->with('success', 'You have successfully registered, Login to access your dashboard');
        //}
    }



    public function update(CustomRequest $request)
     {

        // dd($req->all());
        $credentials = $request->validated();
        if (!auth::guard('customer')->attempt($credentials, $request->get('remember_token')))
        {
            // return to_route('admin.login.index');

            return redirect()->route('front.custom.index');
        }
        // return to_route('admin.layouts.master');
            //  return response()->view('admin.layouts.master');
             return redirect()->route('front.home');
        }





        public function logout(Request $request)
    {
        Auth::guard('customer')->logout();
        $request->session()->invalidate();
        return redirect()->route('front.custom.index');
    }









}

