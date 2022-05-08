<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Admin\BooksRepository;
use App\Repositories\Admin\SlidersRepository;
use App\Repositories\Admin\CategoriesRepository;

class HomeController extends Controller
{
    //



      public function index(BooksRepository  $bookRepo, CategoriesRepository $categoryRepo ,SlidersRepository  $sliderRepo , $category_id = null)
    {

       $categories=$categoryRepo->getCategories(20);
       $books=$bookRepo->getBooks($category_id,20);
       $sliders=$sliderRepo->getSliders(20);

      return response()->view('front.home', ['books' => $books,'categories'=>$categories ,'sliders'=>$sliders]);
    }

}
