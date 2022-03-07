<?php
namespace App\Repositories\Admin;

use App\Models\Author;

class AuthorsRepository
{
    public function getAuthor($id)
    {
        return Author::query()->findOrFail($id);
    }

    public function getAuthors($perPage)

    {

        
        return Author::query()->paginate($perPage);

    }

    public function destroy($id)
    {
        return Author::query()->findOrFail($id)->delete();
    }

    public function store(array $data)
    {
        return Author::query()->create($data);
    }

    public function update($id, array $data)
    {
        return Author::query()->findOrFail($id)->update($data);
    }
}

