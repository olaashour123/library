<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\front\CartRepository;
use App\Repositories\front\BooksRepository;
use App\Repositories\front\CategoriesRepository;

class BookDetailController extends Controller
{
    //
      public function index(BooksRepository  $bookRepo , CategoriesRepository $categoryRepo, CartRepository  $cartRepo  ,$id)
    {


      $categories=$categoryRepo->getCategories(20);
       $book=$bookRepo->getBook($id);

        return response()->view('front.book_detail', ['book' => $book ,'categories'=>$categories ]);
    }

}
