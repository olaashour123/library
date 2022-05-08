<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\front\CategoriesRepository;

class WishlistController extends Controller
{
    public function index(  CategoriesRepository $categoryRepo)
    {
        $categories = $categoryRepo->getCategories(20);
        $customer = auth('customer')->user();
        $wishlist = $customer->wishlist;
        return response()->view('front.wishlist', [
            'categories' => $categories,
            'wishlist' => $wishlist,
        ]);
    }

    public function store()
    {
        // $data = $request->input('bookId');
        // $customer = Auth::guard('customer')->user();
        // if(!$customer->getWishlistIfExist($data)){
        //     $customer->wishlist()->attach($data);
        // }else{
        //     $customer->wishlist()->detach($data);
        // }
        // return redirect()->back();

        $customer = auth('customer')->user();
        if(!$customer->getWishlistIfExist(request('bookId'))){
            $customer->wishlist()->attach(request('bookId'));
            return response()->json(['wishlist' => true]);
        }else{
            $customer->wishlist()->detach(request('bookId'));
            return response()->json(['wishlist' => false]);
        }
    }

    // public function destroy(Request $request, $id)
    // {
    //     $customer = Auth::guard('customer')->user();
    //     $customer->wishlist()->detach($id);
    //     $request->session()->flash('data', [
    //         'title' => 'success',
    //         'message' => 'Deleted Successfully',
    //     ]);
    //     return redirect()->back();
    // }
}
