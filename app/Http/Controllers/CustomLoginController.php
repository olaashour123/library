<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Auth\CustomRequest;

class CustomLoginController extends Controller
{
    //


     public function index() {

        return view('front.custom.index');
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

