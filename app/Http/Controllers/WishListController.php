<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Repositories\front\CustomerRepository;


class WishListController extends Controller
{

      public function index( CustomerRepository $customerRepo)
         {

          $categories = Category::all();
          $customerId = Auth::guard('customer')->id();
          $wishlist = $customerRepo->getCustomer($customerId)->wishlist;
        //   $book=$bookRepo->getBook($id);

          return response()->view('front.wishlist', ['categories' => $categories ,'wishlist'=>$wishlist]);

    }



      public function store()
         {

            if(!auth()->user()->wishlistHas(request('book_id'))) {

                  auth()->user()->wishlist()->attach(request('book_id'));
            }

            return redirect()->route('WishList');
        //
    }



      public function destroy()
         {

        //
    }


}
