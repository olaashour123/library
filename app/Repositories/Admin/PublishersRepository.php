<?php
namespace App\Repositories\Admin;

use App\Models\Publisher;

class PublishersRepository
{
    public function getPublisher($id)
    {
        return Publisher::query()->findOrFail($id);
    }

    public function getPublishers($perPage)
    {
        return Publisher::query()->paginate($perPage);
    }

    public function destroy($id)
    {
        return Publisher::query()->findOrFail($id)->delete();
    }

    public function store(array $data)
    {
        return Publisher::query()->create($data);
    }

    public function update($id, array $data)
    {
        return Publisher::query()->findOrFail($id)->update($data);
    }
}

