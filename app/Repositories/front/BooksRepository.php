<?php
namespace App\Repositories\front;

use App\Models\Book;

class BooksRepository
{
    public function getBook($id)
    {
        return Book::query()->findOrFail($id);
    }

  public function getBooks($category_id, $perPage){

        $category_id = $category_id ?? null;
        return Book::query()
        ->when($category_id,function($query) use($category_id){
            $query->whereHas('categories',function($query) use($category_id){
                $query->where('category_id',$category_id);
            });
        })
        ->paginate($perPage);
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
}

