<?php

namespace App\Repositories\Admin\Users;

use App\Models\User;
use DataTables;

class UserRepository{
    public function getUser($id)
    {
        return User::query()->findOrFail($id);
    }

    public function getUsers($perPage){
        return User::query()->paginate($perPage);
    }

    public function destroy($id)
    {
        return User::query()->findOrFail($id)->delete();
    }

    public function store(array $data)
    {
        return User::query()->create($data);
    }

    public function update($id, array $data)
    {
        return User::query()->findOrFail($id)->update($data);
    }

    public function getDataTableUsers(array $data)
    {
        $query = User::query();

        $name = $data['name'] ?? null;
        $email = $data['email'] ?? null;
        $status = $data['status'] ?? null;

        $skip = $data['start'] ?? 0;
        $take = $data['length'] ?? 25;

        $query = $query->when($name, function ($query) use ($name) {
           $query->where('name', 'LIKE', '%' . $name . '%');
        }); 
        $query = $query->when($status, function ($query) use ($status) {
            $query->where('status', $status);
        });

        $info = $query->skip($skip)->take($take);
        $count = $this->countDataTableUsers($data);
        return Datatables::of($info)->setTotalRecords($count);
    }


    public function countDataTableUsers(array $data)
    {
        $query = User::query();

        $name = $data['name'] ?? null;
        $status = $data['status'] ?? null;
        
        $query = $query->when($name, function ($query) use ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        });
        $query = $query->when($status, function ($query) use ($status) {
            $query->where('status', $status);
        });

        return $query->count('id');
    }
}

// namespace App\Repositories\Admin\Users;

// use App\Models\User;

// class UserRepository
// {
//     public function getUser($id)
//     {
//         return User::query()->findOrFail($id);
//     }

//     public function getUsers($perPage)
//     {
//         return User::query()->paginate($perPage);
//     }

//     public function destroy($id)
//     {
//         return User::query()->findOrFail($id)->delete();
//     }

//     public function store(array $data)
//     {
//         return User::query()->create($data);
//     }

//     public function update($id, array $data)
//     {
//         return User::query()->findOrFail($id)->update($data);
//     }
// }
