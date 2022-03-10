<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //


     public function index() {

        return view('admin.login.index');
        }

        //  public function index(UserRepository $userRepo,
        //                  $id) {
        //    $user = $userRepo->getUser($id);
        // return view('admin.login.index', ['user'=> $user]);
        // }



    public function update(LoginRequest $request)
     {

        // dd($req->all());
        $credentials = $request->validated();
        if (!auth::guard('admin')->attempt($credentials, $request->get('remember_token')))
        {
            // return to_route('admin.login.index');

            return redirect()->route('admin.login.index');
        }
        // return to_route('admin.layouts.master');
            //  return response()->view('admin.layouts.master');
             return redirect()->route('master');
        }









}

