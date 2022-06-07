<?php
namespace App\Repositories\Admin;

use App\Models\Category;
use DataTables;

class CategoriesRepository
{
    public function getCategory($id)
    {
        return Category::query()->findOrFail($id);
    }

    public function getCategories($perPage)
    {
        return Category::query()->paginate($perPage);
    }

    public function destroy($id)
    {
        return Category::query()->findOrFail($id)->delete();
    }

    public function store(array $data)
    {
        return Category::query()->create($data);
    }

    public function update($id, array $data)
    {
        return Category::query()->findOrFail($id)->update($data);
    }


    public function getDataTableCategories(array $data)
    {
        $query = Category::query();

        $name = $data['name'] ?? null;
       


        $skip = $data['start'] ?? 0;
        $take = $data['length'] ?? 25;

        $query = $query->when($name, function ($query) use ($name) {
           $query->where('name', 'LIKE', '%' . $name . '%');
        }); 
        $info = $query->skip($skip)->take($take);
        $count = $this->countDataTableCategories($data);
        return Datatables::of($info)->setTotalRecords($count);
    }


    public function countDataTableCategories(array $data)
    {
        $query = Category::query();

        $name = $data['name'] ?? null;
      
        
        $query = $query->when($name, function ($query) use ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        });
      

        return $query->count('id');
    }
}

