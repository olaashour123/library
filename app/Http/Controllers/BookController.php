<?php

namespace App\Http\Controllers;
use App\Repositories\front\BooksRepository;
use App\Repositories\front\CategoriesRepository;

class BookController extends Controller
{

      public function index(BooksRepository $bookRepo, CategoriesRepository $categoryRepo)
         {

          $categories=$categoryRepo->getCategories(20);
          $books=$bookRepo->getBooks(20);
        return response()->view('front.books', ['books' => $books ,'categories'=>$categories]);
    }

}
