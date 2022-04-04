<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Admin\ChangePassRequest;
use App\Repositories\front\CustomerRepository;


class ChangePasswordController extends Controller
{


    public function update(ChangePassRequest $request,CustomerRepository $customerRepo)
     {
         $data= $request->validated();

        $customerId=Auth::guard('customer')->id();
        $newPassword = Hash::make($data['New_Password']);
         $customerRepo->update($customerId, ['password' => $newPassword]);
               return redirect()->back();

        }

}
