<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Admin\BooksRepository;
use App\Repositories\Admin\CategoriesRepository;

class HomeController extends Controller
{
    //



      public function index(BooksRepository  $bookRepo, CategoriesRepository $categoryRepo  )
    {

      $categories=$categoryRepo->getCategories(20);
       $books=$bookRepo->getBooks(20);
        return response()->view('front.home', ['books' => $books,'categories'=>$categories ]);
    }

}
