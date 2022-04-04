<?php

namespace App\Repositories\front;

use App\Models\OrderAddress;

class  OrderAddressRepository{

    public function getOrderAddress($id)
    {
        return OrderAddress::query()->findOrFail($id);
    }

    public function getOrderAddresses($perPage){
        return OrderAddress::query()->paginate($perPage);
    }

    public function destroy($id)
    {
        return OrderAddress::query()->findOrFail($id)->delete();
    }

    public function store(array $data)
    {
        return OrderAddress::query()->create($data);
    }

    public function update($id, array $data)
    {
        return OrderAddress::query()->findOrFail($id)->update($data);
    }
}
