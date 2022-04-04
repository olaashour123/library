<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Order;
//use Symfony\Component\Intl\Countries;
use App\Models\OrderAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Repositories\front\CartRepository;
use App\Repositories\front\BooksRepository;
use App\Repositories\front\OrderRepository;
use App\Http\Requests\Admin\CheckoutRequest;
use App\Repositories\front\CustomerRepository;
use App\Repositories\front\CategoriesRepository;
use App\Repositories\front\OrderAddressRepository;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
      public function index(BooksRepository $BookRepo, CategoriesRepository $CategoryRepo , CartRepository  $cartRepo)
         {

      $categories=$CategoryRepo->getCategories(20);
      $books=$BookRepo->getBooks(20);
       $customerId=Auth::guard('customer')->id();
       $cart = $cartRepo->getCartByCustomerId($customerId);
      //$countries = Countries::getNames('ar');

        return response()->view('front.checkout', ['books'=> $books,'categories'=>$categories,'cart'=>$cart,'customerId'=> $customerId]);
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

    // public function store(CheckoutRequest $request,
    //                     OrderAddressRepository $addressRepo,
    //                     OrderRepository $orderRepo,
    //                     CustomerRepository $customerRepo,
    //                     CartRepository $cartRepo)
    // {
    //     $data = $request->validated();
    //     DB::beginTransaction();
    //     try{
    //         $address = $addressRepo->store($data);
    //         $customerId = app('customerId');
    //         $order = $orderRepo->store([
    //             'customer_id' => $customerId,
    //             'address_id' => $address->id,
    //             'status' => 'pending',
    //             'payment_status' => 'not_paid',
    //         ]);
    //         $items = $customerRepo->getCustomer($customerId)->cart;
    //         foreach($items as $item){
    //             $order->items()->create([
    //                 'price' => $item->book->price,
    //                 'quantity' => $item->quantity,
    //                 'book_id' => $item->book_id,
    //             ]);
    //             $cartRepo->destroy($item->id);
    //         }
    //         DB::commit();
    //     }catch(Throwable $e){
    //         DB::rollBack();
    //     }
    //     return redirect()->route('home');
    // }
    public function store(CheckoutRequest $request ,  CustomerRepository $customerRepo, OrderRepository $orderRepo , OrderAddressRepository $addressRepo, CartRepository  $cartRepo)
    {
       $data = $request->validated();
       $customerId = Auth::guard('customer')->id();
       $cart = $customerRepo->getCustomer($customerId)->cart;
        if ($cart->count()>0) {
        // $customerId = app('customerId');
        DB::beginTransaction();
        try {
             $address = $addressRepo->store($data);
           // $address_id=OrderAddress::create($request->address_id);

            //  $cart = $cartRepo->getCartByCustomerId($customerId);

             $order = $orderRepo->store([
                'customer_id'=> $customerId,
                'address_id'=> $address->id,
                'status' =>'pending',
                'payment_status' =>'not_paid',
                ]);



      foreach ($cart as $item) {
          $order->items()->create([
                    'book_id' => $item->book_id,
                    'book_name' => $item->book->name,
                    'price' => $item->book->price,
                    'quantity' => $item->quantity,
                ]);
      }

      $cartRepo->destroy($item->id);
   DB::commit();


        } catch (Throwable $e) {
            DB::rollBack();
            throw $e;
        }

          return Redirect()->route('front.home');


          }else{
        return Redirect()->back->withErrors(['message'=>'there is not item ']);


  }



    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
