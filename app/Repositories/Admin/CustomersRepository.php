<?php
namespace App\Repositories\Admin;

use App\Models\Customer;

class CustomersRepository
{
    public function getCustomer($id)
    {
        return Customer::query()->findOrFail($id);
    }

    public function getCustomers($perPage)

    {

        
        return Customer::query()->paginate($perPage);

    }

    public function destroy($id)
    {
        return Customer::query()->findOrFail($id)->delete();
    }

    public function store(array $data)
    {
        return Customer::query()->create($data);
    }

    public function update($id, array $data)
    {
        return Customer::query()->findOrFail($id)->update($data);
    }
}

