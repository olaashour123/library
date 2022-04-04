<?php

namespace App\Http\Controllers;

use App\Repositories\front\BooksRepository;
use App\Repositories\front\OrderRepository;
use App\Repositories\front\CategoriesRepository;

class ProfileController extends Controller
{
    //

      public function index(CategoriesRepository $categoryRepo,OrderRepository $orderRepo) {

      $categories=$categoryRepo->getCategories(20);
      $orders=$orderRepo->getOrders(20);
    //dd($orders);
        return response()->view('front.profile', ['categories'=>$categories,'orders'=>$orders ]);
    }

}
