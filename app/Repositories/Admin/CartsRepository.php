<?php
namespace App\Repositories\Admin;

use App\Models\Cart;

class CartsRepository
{
    public function getCart($id)
    {
        return Cart::query()->findOrFail($id);
    }

    public function getCarts($perPage)

    {

        
        return Cart::query()->paginate($perPage);

    }

    public function destroy($id)
    {
        return Cart::query()->findOrFail($id)->delete();
    }

    public function store(array $data)
    
    {
        return Cart::query()->create($data);
    }


    public function update($id, array $data)
    {
        return Cart::query()->findOrFail($id)->update($data);
    }
}

