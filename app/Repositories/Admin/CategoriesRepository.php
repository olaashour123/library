<?php
namespace App\Repositories\Admin;

use App\Models\Category;

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
}

