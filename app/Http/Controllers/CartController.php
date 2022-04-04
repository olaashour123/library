<?php

namespace App\Http\Controllers;


use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\CartRequest;
use App\Repositories\front\CartRepository;
use App\Repositories\front\CategoriesRepository;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     *
     */
     public function index(CartRepository  $cartRepo )
  {
        $categories = Category::all();
        $customerId = Auth::guard('customer')->id();
        $cart = $cartRepo->getCartByCustomerId($customerId);

        return response()->view('front.cart', ['categories' => $categories , 'cart' => $cart]);

    }

    //  public function index(BooksRepository  $bookRepo, CategoriesRepository $categoryRepo  )
    // {

    //          $categories=$categoryRepo->getCategories(20);
    //         // $customer_id = Auth::guard('customer')->id();
    //      $cart=Cart::with('books')->where('customer_id', Auth::guard('customer')->id())->get();

    //             //  $cart=cart
    //     //  $cart=Cart::with('book_id')->where($customer_id)->get();

    //     //  $categories = Category::all();
    //     // $customerId = Auth::guard('customer')->id();
    //     // $cart = Customer::find($customerId)->cart;
    //     // $cart = $cartRepo->getCartItems(20);
    //     // return response()->view('frontend.cart.index', ['categories' => $categories, 'cart' => $cart]);
    //     return response()->view('front.cart', ['categories'=>$categories ,  'cart'=>$cart]);
    // }

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
    public function store(CartRequest $request, CartRepository  $cartRepo  )
    {


        $data = $request->validated();

        $customerId = Auth::guard('customer')->id();
        $data += ['customer_id' => $customerId];
        $cart = Cart::where([
            'customer_id' => $customerId,
            'book_id' => $data['book_id']
        ])->first();

          if($cart){

         $model = $cartRepo->update($cart->id,['quantity'=>$cart->quantity+$data['quantity']]);

        }else{

             $model = $cartRepo->store($data);
        }

     if ($cart->count()>0) {


      //  $customerId = Auth::guard('customer')->id();
         // $data += ['customer_id' => $customerId];
        // $cart = Cart::where([
        //     'customer_id' => $customerId,
        //     'book_id' => $data['book_id']
        // ])->first();
        // if($cart){

        //  $model = $cartRepo->update($cart->id,['quantity'=>$cart->quantity+$data['quantity']]);

        // }else{

        //      $model = $cartRepo->store($data);
        // }



        if (! $model) {
            $request->session()->flash('data', [
                'title' => 'danger',
                'code' => 400,
                'message' => 'Error While Adding',
            ]);
            return redirect()->route('front.cart');
        }
        $request->session()->flash('data', [
            'title' => 'success',
            'code' => 200,
            'message' => 'Added Successfully',
        ]);
        return redirect()->route('front.cart');


         }else{
        return Redirect()->back->withErrors(['message'=>'there is not item ']);


  }
    }


//          $data=$request->validated();
//          $book=Book::findOrFail($request->post('book_id'));
//          $quantity=$request->post('quantity',1);
// dd(11);
//          Cart::updateOrCreate([
//              'customer_id'=>Auth::guard('customer')->id(),
//              'book_id'=>$book->id,
//          ],[
//              'price'=>$book->price,
//              'quantity'=>DB::raw(" quantity"+$quantity)
//          ]);

        //   return redirect()->route('front.cart')->with('success',__('Book: addTo Cart!', ['name'=> $book->name,'data'=>$data]));




 /*$cart = Cart::where('user_id', $user->id)
                ->where('product_id', $product_id)
                ->first();
            if ($cart) {
                $cart->update([
                        'quantity' => $cart->quantity + $request->post('quantity', 1),
                        'price' => Product::find($product_id)->price,
                    ]);
            } else {
                $cart = Cart::forceCreate([
                    'user_id' => $user->id,
                    'product_id' => $product_id,
                    'quantity' => $request->post('quantity', 1),
                    'price' => Product::find($product_id)->price,
                ]);
            }*/

            // return redirect()->route('cart');




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

    public function edit( CartRepository  $cartRepo, $id)
    {
    //    $cart= $cartRepo->getCartByCustomerId($id);
    //     return view('front.cart.edit', compact('cart'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, CartRepository $cartRepo)
    {
        $data = $request->all();
      if ($data['quantity']->count()>0) {
        // foreach($data['quantity'] as $key => $value)
        // {
        //     echo $key . ' - ' . $value . '<br />';
        // }
        foreach($data['quantity'] as $key => $value)
        {
            $cartRepo->update($key, ['quantity'=> $value]);
        }
        return redirect()->back();
         }else{
              return Redirect()->back()->withErrors(['message'=>'there is no item ']);
          }



            //  if ($data['quantity'] <= 0) {
            //         $cartRepo->destroy(['quantity'=> $value]);
            //     } else {
            //          $cartRepo->update($key, ['quantity'=> $value]);
            //     }

    }



    public function destroy(CartRepository $cartRepo, Request $request, $id)
    {
        $model = $cartRepo->destroy($id);
        if(! $model){
            $request->session()->flash('data', [
                'title' => 'danger',
                'message' => 'Error While Deleting',
            ]);
            return redirect()->back();
        }
        $request->session()->flash('data', [
            'title' => 'success',
            'message' => 'Deleted Successfully',
        ]);
        return redirect()->back();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */

}




































































// <?php

// namespace App\Http\Controllers\Frontend\Cart;

// use App\Http\Controllers\Controller;
// use App\Http\Requests\Frontend\Cart\CreateCartRequest;
// use App\Models\Cart\Cart;
// use App\Models\Categories\Category;
// use App\Models\Customers\Customer;
// use App\Repositories\Frontend\Cart\CartRepository;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;

// class CartController extends Controller
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index(CartRepository $cartRepo)
//     {
//         $categories = Category::all();
//         $customerId = Auth::guard('customer')->id();
//         $cart = $cartRepo->getCartByCustomerId($customerId);

//         return response()->view('frontend.cart.index', ['categories' => $categories, 'cart' => $cart]);
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(CreateCartRequest $request, CartRepository $cartRepo)
//     {
//         $data = $request->validated();
//         $customerId = Auth::guard('customer')->id();
//         $data += ['customer_id' => $customerId];

//         // $cart = Cart::where([
//         //     'customer_id' => $data['customer_id'],
//         //     'book_id' => $data['book_id']
//         // ]);
//         // if($cart){
//         //     $model = $cartRepo->update($cart->id, $data);
//         // }else{
//         //     $model = $cartRepo->store($data);
//         // }

//         $model = $cartRepo->store($data);

//         if(! $model){
//             $request->session()->flash('data', [
//                 'title' => 'danger',
//                 'code' => 400,
//                 'message' => 'Error While Adding',
//             ]);
//             return redirect()->back();
//         }
//         $request->session()->flash('data', [
//             'title' => 'success',
//             'code' => 200,
//             'message' => 'Added Successfully',
//         ]);
//         return redirect()->back();
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request)
//     {
//         $data = $request->all();
//         foreach($data['quantity'] as $key => $value)
//         {
//             echo $key . ' - ' . $value . '<br />';
//         }
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         //
//     }
// }


//////////////
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


// /////
// class CartController extends Controller
// {
//     public function index()
//     {
//         $user = Auth::user();

//         if ($user) {
//             return view('cart', [
//                 'products' => $user->cartProducts,
//             ]);
//         }

//         $request = request();

//         $product_ids = $request->cookie('cart', []);
//         if ($product_ids) {
//             $product_ids = unserialize($product_ids);
//         }
//         $ids = array_keys($product_ids);

//         $products = Product::whereIn('id', $ids)->get();

//         return view('cart', [
//             'products' => $products,
//             'quantity' => $product_ids,
//         ]);
//     }


//     public function store(Request $request)
//     {
//         $request->validate([
//             'product_id' => 'required|int|exists:products,id',
//             'quantity' => 'int',
//         ]);
//         $product_id = $request->post('product_id');

//         $user = Auth::user();

//         if ($user) {
//             $quantity = $request->post('quantity', 1);
//             $price = Product::find($product_id)->price;

//             Cart::updateOrCreate(
//                 ['user_id' => $user->id, 'product_id' => $product_id],
//                 [
//                     'quantity' => DB::raw('quantity + ' . $quantity),
//                     'price' => $price
//                 ]
//             );

//             /*$cart = Cart::where('user_id', $user->id)
//                 ->where('product_id', $product_id)
//                 ->first();
//             if ($cart) {
//                 $cart->update([
//                         'quantity' => $cart->quantity + $request->post('quantity', 1),
//                         'price' => Product::find($product_id)->price,
//                     ]);
//             } else {
//                 $cart = Cart::forceCreate([
//                     'user_id' => $user->id,
//                     'product_id' => $product_id,
//                     'quantity' => $request->post('quantity', 1),
//                     'price' => Product::find($product_id)->price,
//                 ]);
//             }*/

//             return redirect()->route('cart');

//         } else {
//             $products = $request->cookie('cart', []);
//             if ($products) {
//                 $products = unserialize($products);
//             }

//             if (array_key_exists($product_id, $products)) {
//                 $products[$product_id]++;
//             } else {
//                 $products[$product_id] = 1;
//             }


//             $cookie = Cookie::make('cart', serialize($products), 10080); // One week

//             return redirect()->route('cart')
//                 ->cookie($cookie);
//         }
//     }

//     public function update(Request $request)
//     {
//         $quantity = $request->post('quantity');
//         $user = Auth::user();
//         if ($user) {
//             foreach ($quantity as $pid => $q) {
//                 $cart = Cart::where([
//                     'user_id' => $user->id,
//                     'product_id' => $pid
//                 ]);
//                 if ($q <= 0) {
//                     $cart->delete();
//                 } else {
//                     $cart->update([
//                         'quantity' => $q
//                     ]);
//                 }
//             }
//         }
//         return redirect()->route('cart');
//     }

//     public function remove($product_id)
//     {
//         $user = Auth::user();
//         if ($user) {
//             Cart::where('user_id', $user->id)
//                 ->where('product_id', $product_id)
//                 ->delete();
//             return redirect()->route('cart');
//         }
