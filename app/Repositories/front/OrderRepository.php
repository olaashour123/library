<?php
namespace App\Repositories\front;

use App\Models\Order;
use App\Models\OrderAddress;

class OrderRepository
{
    public function getOrder($id)
    {
        return Order::query()->findOrFail($id);
    }

    public function getOrders($perPage)
    {
        return Order::query()->paginate($perPage);

    }

     public function getOrderByAddress_Id($address_id)
    {
        return Order::query()
        ->with(['order_addresses'])
        ->where('address_id', $address_id)
        ->get();
    }

    public function destroy($id)
    {
        return Order::query()->findOrFail($id)->delete();
    }

    public function store(array $data)
    {
        return Order::query()->create($data);
    }

    public function update($id, array $data)
    {
        return Order::query()->findOrFail($id)->update($data);
    }
}

