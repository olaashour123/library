<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Customer;
 use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\BookRequest;
use App\Http\Requests\Admin\CartRequest;
use App\Repositories\front\BooksRepository;
use App\Repositories\front\CategoriesRepository;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(BooksRepository  $bookRepo, CategoriesRepository $categoryRepo  )
    {

             $categories=$categoryRepo->getCategories(20);
            // $customer_id = Auth::guard('customer')->id();
         $cart=Cart::with('books')->where('customer_id',Auth::guard('customer')->id())->get();

                //  $cart=cart
        //  $cart=Cart::with('book_id')->where($customer_id)->get();

        //  $categories = Category::all();
        // $customerId = Auth::guard('customer')->id();
        // $cart = Customer::find($customerId)->cart;
        // // $cart = $cartRepo->getCartItems(20);
        // return response()->view('frontend.cart.index', ['categories' => $categories, 'cart' => $cart]);



        return response()->view('front.cart', ['categories'=>$categories ,  'cart'=>$cart]);
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
    public function store(CartRequest $request)
    {

        dd(1);
         $data=$request->validated();
         $book=Book::findOrFail($request->post('book_id'));
         $quantity=$request->post('quantity',1);

         Cart::updateOrCreate([
             'customer_id'=>Auth::guard('customer')->id(),
             'book_id'=>$book->id,
         ],[
             'price'=>$book->price,
             'quantity'=>DB::raw("quantity+$quantity")
         ]);

          return redirect()->route('front.cart')->with('success',__('Book: addTo Cart!', ['name'=> $book->name,'data'=>$data]));







    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        //
    }
}


// <?php

// namespace App\Http\Controllers;

// use App\Cart;
// use App\Product;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Cookie;
// use Illuminate\Support\Facades\DB;
// use Ramsey\Uuid\Uuid;

// class CartController extends Controller
// {
//     public function index()
//     {
//         $user_id = Auth::id();

//         $cart = Cart::with('product')
//             ->where('id', $this->getCartId())
//             ->when($user_id, function($query, $user_id) {
//                 $query->where('user_id', $user_id)->orWhereNull('user_id');
//             })
//             ->get();
//         return view('cart', [
//             'cart' => $cart,
//         ]);
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'product_id' => 'required|int|exists:products,id',
//             'quantity' => 'int|min:1',
//         ]);
//         $product = Product::findOrFail($request->post('product_id'));
//         $quantity = $request->post('quantity', 1);

//         /*$cart = Cart::where([
//             'user_id' => Auth::id(),
//             'product_id' => $product->id,
//         ])->first();
//         if ($cart) {
//             //$cart->increment('quantity', $quantity);
//             Cart::where([
//                 'user_id' => Auth::id(),
//                 'product_id' => $product->id,
//             ])->increment('quantity', $quantity);
//         } else {
//             Cart::create([
//                 'user_id' => Auth::id(),
//                 'product_id' => $product->id,
//                 'price' => $product->price,
//                 'quantity' => $quantity,
//             ]);
//         }*/

//         Cart::updateOrCreate([
//             'id' => $this->getCartId(),
//             'user_id' => Auth::id(),
//             'product_id' => $product->id,
//         ], [
//             'price' => $product->price,
//             'quantity' => DB::raw("quantity + $quantity"),
//         ]);

//         return redirect()
//             ->route('cart')
//             ->with('success', __('Product :name added to cart!', [
//                 'name' => $product->name,
//             ]));
//     }

//     protected function getCartId()
//     {
//         $request = request();
//         $id = $request->cookie('cart_id');
//         if (!$id) {
//             $uuid = Uuid::uuid1();
//             $id = $uuid->toString();
//             Cookie::queue(Cookie::make('cart_id', $id, 43800));
//         }

//         return $id;
//     }
// }
