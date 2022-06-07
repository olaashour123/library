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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,
                        UserRepository $userRepo)
    {
        if (!$request->expectsJson()) {
            return view('admin.users.index');
        }

        $dataTable = $userRepo->getDataTableUsers($request->all());

        $dataTable->addColumn('status', function ($row) {
            $info = $row;
            return view('admin.users.parts.status', compact('info'))->render();
        });
     
        $dataTable->addColumn('actions', function ($row) {
           $info = $row;
            return view('admin.users.parts.actions', compact('info'))->render();
        });

        $dataTable->editColumn('created_at', function ($row) {
            return '<bdi>' . $row->created_at . '</bdi>';
        });

        
        $dataTable->addIndexColumn();
        $dataTable->escapeColumns(['*']);
        return $dataTable->make(true);

    }
 
    public function show($id){
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $validated = $request->validated();
        $isAdded = User::create($validated);

        if (!$isAdded) {
            return $this->sendError([
                'title' => 'Error',
                'message' => 'Error While Adding',
            ]);
        }
        return $this->sendResponse([
            'title' => 'Success',
            'message' => 'Added Successfully',
        ], route('admin.users.index'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRepository $userRepo, $id)
    {
        $user = $userRepo->getUser($id);
        return response()->view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditUserRequest $request, UserRepository $userRepo, $id)
    {
        $data = $request->validated();
        // $userRepo->getUser($id);

        $isUpdated = $userRepo->update($id,$data);
        if (!$isUpdated) {
            return $this->sendError([
                'title' => 'Error',
                'message' => 'Error While Updating',
            ]);}
        return $this->sendResponse([
            'title' => 'Success',
            'message' => 'Update Successfully',
        ], route('admin.users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, UserRepository $userRepo, $id)
    {

        // dd(123);
        // $userRepo->getUser($id);

        $isDeleted = $userRepo->destroy($id);
        if (!$isDeleted) {
            return $this->sendError([
                'title' => 'Error',
                'message' => 'Error While Deleting',
            ]);   }
        return $this->sendResponse([
            'title' => 'Success',
            'message' => 'Deleted Successfully',
        ]);
        //return redirect()->route('admin.users.index');
    }
}




// namespace App\Http\Controllers\Admin\Users;

// use App\Models\User;
// use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use App\Repositories\Admin\Users\UserRepository;
// use App\Http\Requests\Admin\Users\EditUserRequest;
// use App\Http\Requests\Admin\Users\CreateUserRequest;

// class UserController extends Controller
// {
//     public function index(UserRepository $userRepo)
//     {
//         $users = $userRepo->getUsers(20);
//         return response()->view('admin.users.index', ['users' => $users]);
//     }

//     public function create()
//     {
//         return view('admin.users.create');
//     }

//     public function store(CreateUserRequest $request)
//     {
//         $data = $request->validated();

//         $add = User::create($data);
//         if (!$add) {
//             $request->session()->flash('data', [
//                 'title' => 'Error',
//                 'code' => 400,
//                 'message' => 'Error While Adding'
//             ]);
//             return redirect()->route('admin.users.index');
//         }

//         $request->session()->flash('data', [
//             'title' => 'success',
//             'code' => 200,
//             'message' => 'Added Successfully'
//         ]);
//         return redirect()->route('admin.users.index');
//     }

//     public function edit(UserRepository $userRepo,
//                          $id)
//     {
//         $user = $userRepo->getUser($id);
//         return view('admin.users.edit', compact('user'));
//     }

//     public function update(EditUserRequest $request,
//                            UserRepository $userRepo,
//                            $id)
//     {
//         $data = $request->validated();
//        /// $userRepo->getUser($id);

//         $update = $userRepo->update($id,$data);
//         if (!$update) {
//             $request->session()->flash('data', [
//                 'title' => 'Error',
//                 'code' => 400,
//                 'message' => 'Error While Updating'
//             ]);
//             return redirect()->route('admin.users.index');
//         }

//         $request->session()->flash('data', [
//             'title' => 'success',
//             'code' => 200,
//             'message' => 'Updated Successfully'
//         ]);
//         return redirect()->route('admin.users.index');
//     }

//     public function destroy(Request $request,
//                             UserRepository $userRepo,
//                             $id)
//     {
//         $userRepo->getUser($id);
//         $delete = $userRepo->destroy($id);
//         return redirect('admin.users.index');
//         if (!$delete) {
//             $request->session()->flash('data', [
//                 'title' => 'Error',
//                 'code' => 400,
//                 'message' => 'Error While Deleting'
//             ]);
//         }
//         return redirect('admin.users.index');

//         $request->session()->flash('data', [
//             'title' => 'success',
//             'code' => 200,
//             'message' => 'Deleted Successfully'
//         ]);
//     }
// }

