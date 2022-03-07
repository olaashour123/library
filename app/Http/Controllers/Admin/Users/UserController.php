<?php

namespace App\Http\Controllers\Admin\Users;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Admin\Users\UserRepository;
use App\Http\Requests\Admin\Users\EditUserRequest;
use App\Http\Requests\Admin\Users\CreateUserRequest;

class UserController extends Controller
{
    public function index(UserRepository $userRepo)
    {
        $users = $userRepo->getUsers(20);
        return response()->view('admin.users.index', ['users' => $users]);
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $data = $request->validated();

        $add = User::create($data);
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
            'message' => 'Added Successfully'
        ]);
        return redirect()->route('admin.users.index');
    }

    public function edit(UserRepository $userRepo,
                         $id)
    {
        $user = $userRepo->getUser($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(EditUserRequest $request,
                           UserRepository $userRepo,
                           $id)
    {
        $data = $request->validated();
       /// $userRepo->getUser($id);

        $update = $userRepo->update($id,$data);
        if (!$update) {
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

    public function destroy(Request $request,
                            UserRepository $userRepo,
                            $id)
    {
        $userRepo->getUser($id);
        $delete = $userRepo->destroy($id);
        return redirect('admin.users.index');
        if (!$delete) {
            $request->session()->flash('data', [
                'title' => 'Error',
                'code' => 400,
                'message' => 'Error While Deleting'
            ]);
        }
        return redirect('admin.users.index');

        $request->session()->flash('data', [
            'title' => 'success',
            'code' => 200,
            'message' => 'Deleted Successfully'
        ]);
    }
}
