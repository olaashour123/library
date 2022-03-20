<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\CustomerRequest;
use App\Repositories\Admin\CustomersRepository;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function index(CustomersRepository  $customerRepo)
    {


       $customers=$customerRepo->getCustomers(20);
        return response()->view('admin.customers.index', ['customers' => $customers ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomersRepository  $customerRepo,$id)
    {
        $customer = $customerRepo->getCustomer($id);
    //    $publishers=Publisher::all();
        return view('admin.customers.edit',['customer' => $customer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request,CustomersRepository  $customerRepo, $id)
    {
         $data = $request->validated();

          $customer = $customerRepo->getCustomer($id);
        // $customer->books()->sync($data['books']);


        if (isset($data['image'])) {

            $image = $data['image'];
            $imageName = Carbon::now()->format('Y_m_d_h_i')  .  '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/categories', $imageName, ['disk ' =>'public']);
            // dd($imageName);
            $data['image'] = 'public/categories/' . $imageName;
            Storage::disk('public')->delete($customer->image);
            }else {
            $data['image'] = $customer->image;
        }


        $update = $customerRepo->update($id,$data);

        if (!$update) {
            $request->session()->flash('data', [
                'title' => 'Error',
                'code' => 400,
                'message' => 'Error While Updating'
            ]);
            return redirect()->route('admin.customers.index');
        }

        $request->session()->flash('data', [
            'title' => 'success',
            'code' => 200,
            'message' => 'Updated Successfully'
        ]);
          return redirect()->route('admin.customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
  
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request,
                           CustomersRepository  $customerRepo,
                            $id)
    {
        $customerRepo->getCustomer($id);
        $customer = $customerRepo->destroy($id);

        return redirect()->route('admin.customers.index' ,['customer' =>  $customer]);


    }
}
