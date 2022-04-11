<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\SliderRequest;
use App\Repositories\Admin\SlidersRepository;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderby('id', 'desc')->paginate(10);
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request, SlidersRepository  $sliderRepo)
    {
        $data = $request->validated();


        $image =$data['image'];
        $imageName=Carbon::now()->format('Y_m_d_h_i')  .  '.' . $image->getClientOriginalExtension();
        $image->storeAs('/Sliders', $imageName, ['disk' =>'public']);

        $data['image'] = 'Sliders/' . $imageName;

        $add =$sliderRepo->store($data);

        if (!$add) {
            $request->session()->flash('data', [
                'title' => 'Error',
                'code' => 400,
                'message' => 'Error While Adding'
            ]);
            return redirect()->route('admin.sliders.index');
        }

        $request->session()->flash('data', [
            'title' => 'success',
            'code' => 200,
            'message' => 'Added Successfully'
        ]);
        return redirect()->route('admin.sliders.index');
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
    public function edit($slider, SlidersRepository  $sliderRepo)
    {
        $slider = $sliderRepo->getSlider($slider);
        // $slider = Slider::findOrFail($slider);
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $slider, SlidersRepository  $sliderRepo)
    {
        //  $slider = Slider::find($slider);
        $data = $request->validated();
        $slider = $sliderRepo->getSlider($slider);
       

        if (isset($data['image'])) {
            $image = $data['image'];
            $imageName = Carbon::now()->format('Y_m_d_h_i')  .  '.' . $image->getClientOriginalExtension();
            $image->storeAs('/Sliders', $imageName, ['disk ' =>'public']);
            $data['image'] = 'Sliders/' . $imageName;
            Storage::disk('public')->delete($slider->image);
        } else {
            $data['image'] = $slider->image;
        }

        $update = $sliderRepo->update($slider, $data);


        if (!$update) {
            $request->session()->flash('data', [
                'title' => 'Error',
                'code' => 400,
                'message' => 'Error While Updating'
            ]);
            return redirect()->route('admin.sliders.index');
        }


        $request->session()->flash('data', [
            'title' => 'success',
            'code' => 200,
            'message' => 'Updated Successfully'
        ]);
        return redirect()->route('admin.sliders.index');
    }

    // /**

    //   $slider->save();

    //   return redirect()->route('sliders.index',
    //       $slider->id)->with('success',
    //       'slider'. $slider->title.' updated');


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( SlidersRepository  $sliderRepo, $slider )
    {
        $sliderRepo->getSlider($slider);
        $slider = $sliderRepo->destroy($slider);

        return redirect()->route('admin.sliders.index', ['slider'=>$slider]);


    }
}


    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Book  $book
    //  * @return \Illuminate\Http\Response
    //  */
    //  public function edit(BooksRepository  $bookRepo,$id)
    // {
    //    $book = $bookRepo->getBook($id);
    //    $publishers=Publisher::all();
    //     $categories=Category::all();
    //        $authors=Author::all();
    //     return view('admin.books.edit',['book' => $book, 'publishers'=>$publishers,'categories'=> $categories,'authors'=>$authors]);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Author  $author
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(BookRequest $request, BooksRepository  $bookRepo , PublishersRepository  $publisherRepo , $id)
    // {
    //      $data = $request->validated();

    //      $publishers = $publisherRepo->getPublisher($data['publisher_id']) ;

    //     $book = $bookRepo->getBook($id);




    //     if (isset($data['image'])) {

    //         $image = $data['image'];
    //         $imageName = Carbon::now()->format('Y_m_d_h_i')  .  '.' . $image->getClientOriginalExtension();
    //         $image->storeAs('public/Books', $imageName, ['disk ' =>'public']);
    //         $data['image'] = 'public/Books/' . $imageName;
    //         Storage::disk('public')->delete($book->image);
    //     }else{
    //         $data['image'] = $book->image;
    //     }




    //   //  $data['publisher_id'] = $data['publishers'];
    // $update = $bookRepo->update($id,$data);


    //     if (!$update) {
    //         $request->session()->flash('data', [
    //             'title' => 'Error',
    //             'code' => 400,
    //             'message' => 'Error While Updating'
    //         ]);
    //         return redirect()->route('admin.books.index');
    //     }

    //      $book->authors()->sync($data['authors']);
    //      $book->categories()->sync($data['categories']);
    //       $book->publisher()->dissociate();
    //      $book->publisher()->associate($publishers);

    //     $request->session()->flash('data', [
    //         'title' => 'success',
    //         'code' => 200,
    //         'message' => 'Updated Successfully'
    //     ]);
    //       return redirect()->route('admin.books.index');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Author  $author
    //  * @return \Illuminate\Http\Response
    //  */
    //  public function destroy(Request $request,
    //                       BooksRepository  $bookRepo ,
    //                         $id)
    // {
    //     $bookRepo->getBook($id);
    //     $book = $bookRepo->destroy($id);

    //     return redirect()->route('admin.books.index',['book'=>$book]);



    //     $categoryRepo->getCategory($id);
    //     $delete = $categoryRepo->destroy($id);
    //     return redirect()->route('admin.categories.index');
    //     if (!$delete) {
    //         $request->session()->flash('data', [
    //             'title' => 'Error',
    //             'code' => 400,
    //             'message' => 'Error While Deleting'
    //         ]);
    //     }
    //     return redirect()->route('admin.categories.index');

    //     $request->session()->flash('data', [
    //         'title' => 'success',
    //         'code' => 200,
    //         'message' => 'Deleted Successfully'
    //     ]);

    //      return redirect()->route('admin.categories.index');
    // }




   // }
//}

