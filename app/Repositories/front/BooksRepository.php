<?php
namespace App\Repositories\front;

use App\Models\Book;

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
}

