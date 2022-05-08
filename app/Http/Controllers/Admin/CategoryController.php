<?php

namespace App\Http\Controllers\Admin;

use session;
use App\Models\Category;


use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\CategoryRequest;
use App\Repositories\Admin\CategoriesRepository;

class CategoryController extends Controller
{

    /**public function __construct() {
        $this->middleware('admin')->except('index');
    }*/


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoriesRepository  $categoryRepo)
    {
       $categories=$categoryRepo->getCategories(20);
        return response()->view('admin.categories.index', ['categories' => $categories]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        // $categories = $request->validated();

           $image = $request->file('image');
           $imageName=Carbon::now()->format('Y_m_d_h_i')  .  '.' . $image->getClientOriginalExtension();
           $request->file('image')->storeAs('public/categories',$imageName,['disk ' =>'public']);
        //    $request->image = 'categories/' . $imageName;
            $categories = $request->validated();
            $categories['image'] = 'categories/' . $imageName;

        // if($request->hasFile('image')){
        //    $image = $request->file('image');
        //    $imageName=Carbon::now()->formate('Y_m_d_h_i')  .  '.' . $image->getClientOriginalExtension();
        //    $request->file('image')->storeAs('/categories',$imageName,['disk ' =>'public']);
        // //    $request->image = 'categories/' . $imageName;
        //     $categories = $request->validated();
        //     $categories['image'] = 'categories/' . $imageName;
        // }


        $add = Category::create($categories);
        if (!$add) {
            $request->session()->flash('categories', [
                'title' => 'Error',
                'code' => 400,
                'message' => 'Error While Adding'
            ]);
            return redirect()->route('admin.categories.index');
        }

        $request->session()->flash('categories', [
            'title' => 'success',
            'code' => 200,
            'message' => 'Added Successfully'
        ]);
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( CategoriesRepository  $categoryRepo, $id)
    {
       $category = $categoryRepo->getCategory($id);
        return view('admin.categories.edit', compact('category'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, CategoriesRepository  $categoryRepo , $id)
      {
        $data = $request->validated();
        $category = $categoryRepo->getCategory($id);

        if (isset($data['image'])) {

            $image = $data['image'];
            $imageName = Carbon::now()->format('Y_m_d_h_i')  .  '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/categories', $imageName, ['disk ' =>'public']);
            // dd($imageName);
            $data['image'] = 'public/categories/' . $imageName;
            Storage::disk('public')->delete($category->image);
        }else{
            $data['image'] = $category->image;
        }

        $update = $categoryRepo->update($id,$data);

        if (!$update) {
            $request->session()->flash('data', [
                'title' => 'Error',
                'code' => 400,
                'message' => 'Error While Updating'
            ]);
            return redirect()->route('admin.categories.index');
        }

        $request->session()->flash('data', [
            'title' => 'success',
            'code' => 200,
            'message' => 'Updated Successfully'
        ]);
          return redirect()->route('admin.categories.index');


    }

    public function destroy(Request $request,
                            CategoriesRepository  $categoryRepo,
                            $id)
    {
        $categoryRepo->getCategory($id);
        $delete = $categoryRepo->destroy($id);
        return redirect()->route('admin.categories.index');
        if (!$delete) {
            $request->session()->flash('data', [
                'title' => 'Error',
                'code' => 400,
                'message' => 'Error While Deleting'
            ]);
        }
        return redirect()->route('admin.categories.index');

        $request->session()->flash('data', [
            'title' => 'success',
            'code' => 200,
            'message' => 'Deleted Successfully'
        ]);

         return redirect()->route('admin.categories.index');
    }




}
