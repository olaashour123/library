<?php
namespace App\Repositories\Admin;

use App\Models\Book;
use DataTables;

class BooksRepository
{
    public function getBook($id)
    {
        return Book::query()->findOrFail($id);
    }

    public function getBooks($perPage)

    {
        return Book::query()->paginate($perPage);

    }

    public function destroy($id)
    {
        return Book::query()->findOrFail($id)->delete();
    }

    public function store(array $data)
    {
        return Book::query()->create($data);
    }

    public function update($id, array $data)
    {
        return Book::query()->findOrFail($id)->update($data);
    }


    
    public function getDataTableBooks(array $data)
    {
        $query = Book::query();

        $name = $data['name'] ?? null;
       


        $skip = $data['start'] ?? 0;
        $take = $data['length'] ?? 25;

        $query = $query->when($name, function ($query) use ($name) {
           $query->where('name', 'LIKE', '%' . $name . '%');
        }); 
        $info = $query->skip($skip)->take($take);
        $count = $this->countDataTableBooks($data);
        return Datatables::of($info)->setTotalRecords($count);
    }


    public function countDataTableBooks(array $data)
    {
        $query = Book::query();

        $name = $data['name'] ?? null;
      
        
        $query = $query->when($name, function ($query) use ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        });
      

        return $query->count('id');
    }
}


