<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Users\ChangePasswordRequest;
use App\Repositories\Admin\Users\UserRepository;

use Illuminate\Http\Request;

class ChangePasswordController extends Controller
{
    //

     public function edit(UserRepository $userRepo,
                         $id)
    {
        $user = $userRepo->getUser($id);
        return view('admin.users.password', ['user'=> $user]);
    }

    public function update(ChangePasswordRequest $request,
                           UserRepository $userRepo,
                           $id)
    {
        $data = $request->validated();
        $model = $userRepo->update($id, $data);

        if (!$model) {
            $request->session()->flash('data', [
                'title' => 'Error',
                'code' => 400,
                'message' => 'Error While Updating'
            ]);
            return redirect()->route('admin.users.index');
        }
        $request->session()->flash('data', [
            'title' => 'success',
            'code' => 200,
            'message' => 'Updated Successfully'
        ]);
        return redirect()->route('admin.users.index');
    }




}
