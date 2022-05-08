<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Repositories\front\BooksRepository;
use App\Repositories\front\OrderRepository;
use App\Repositories\front\CustomerRepository;
use App\Repositories\front\CategoriesRepository;

class ProfileController extends Controller
{
    //

      public function index(CategoriesRepository $categoryRepo,OrderRepository $orderRepo, CustomerRepository $customerRepo) {

      $categories=$categoryRepo->getCategories(20);
      $countries = Country::all();
      $orders=$orderRepo->getOrders(20);
      $customer=auth('customer')->user();

        return response()->view('front.profile', ['categories'=>$categories,'orders'=>$orders,'customer'=> $customer,
        'countries'=>$countries ]);
    }

}
