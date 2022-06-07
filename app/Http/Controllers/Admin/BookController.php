<?php

namespace App\Http\Controllers\Admin;
use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\BookRequest;
use App\Repositories\Admin\BooksRepository;
use App\Repositories\Admin\PublishersRepository;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request,BooksRepository  $bookRepo)
    {

        if (!$request->expectsJson()) {
            return view('admin.books.index');
        }

        $dataTable = $bookRepo->getDataTableBooks($request->all());

     
        $dataTable->addColumn('actions', function ($row) {
           $info = $row;
            return view('admin.books.parts.actions', compact('info'))->render();
        });

        $dataTable->editColumn('created_at', function ($row) {
            return '<bdi>' . $row->created_at . '</bdi>';
        });

        $dataTable->editColumn('image', function ($row) {
            return view('admin.books.parts.image', compact('row'))->render();
        });

        
        $dataTable->addIndexColumn();
        $dataTable->escapeColumns(['*']);
        return $dataTable->make(true);



    //    $books=$bookRepo->getBooks(20);
    //     return response()->view('admin.books.index', ['books' => $books ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books =Book::all();
        $publishers =Publisher::all();
          $categories=Category::all();
           $authors=Author::all();

         return response()->view('admin.books.create',['books' => $books,'publishers' => $publishers, 'categories'=>$categories,'authors'=> $authors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request,BooksRepository  $bookRepo, PublishersRepository  $publisherRepo )
    {
         
          $data = $request->validated();


           $image =$data['image'];
           $imageName=Carbon::now()->format('Y_m_d_h_i')  .  '.' . $image->getClientOriginalExtension();
           $image->storeAs('public/Books',$imageName,['disk' =>'public']);

           $data['image'] = 'public/Books/' . $imageName;

    //    $data['publisher_id'] = $data['publishers'];
          
           $add = $bookRepo->store($data); 
           if (!$add) {
            return $this->sendError([
                'title' => 'Error',
                'message' => 'Error While Adding',
            ]);
        }
        $publishers = $publisherRepo->getPublisher($data['publisher_id']) ;

           $add->publisher()->associate($publishers);
           $add->categories()->sync($data['categories']);
           $add->authors()->sync($data['authors']);
          
            return $this->sendResponse([
                'title' => 'Success',
                'message' => 'Added Successfully',
            ], route('admin.books.index'));
     
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
     public function edit(BooksRepository  $bookRepo,$id)
    {
       $book = $bookRepo->getBook($id);
       $publishers=Publisher::all();
        $categories=Category::all();
           $authors=Author::all();
        return view('admin.books.edit',['book' => $book, 'publishers'=>$publishers,'categories'=> $categories,'authors'=>$authors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(BookRequest $request, BooksRepository  $bookRepo , PublishersRepository  $publisherRepo , $id)
    {
         $data = $request->validated();



         $publishers = $publisherRepo->getPublisher($data['publisher_id']) ;

        $book = $bookRepo->getBook($id);




        if (isset($data['image'])) {

            $image = $data['image'];
            $imageName = Carbon::now()->format('Y_m_d_h_i')  .  '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/Books', $imageName, ['disk ' =>'public']);
            $data['image'] = 'public/Books/' . $imageName;
            Storage::disk('public')->delete($book->image);
        }else{
            $data['image'] = $book->image;
        }




      //  $data['publisher_id'] = $data['publishers'];
    $update = $bookRepo->update($id,$data);


        if (!$update) {
            $request->session()->flash('data', [
                'title' => 'Error',
                'code' => 400,
                'message' => 'Error While Updating'
            ]);
            return redirect()->route('admin.books.index');
        }

         $book->authors()->sync($data['authors']);
         $book->categories()->sync($data['categories']);
          $book->publisher()->dissociate();
         $book->publisher()->associate($publishers);

        $request->session()->flash('data', [
            'title' => 'success',
            'code' => 200,
            'message' => 'Updated Successfully'
        ]);
          return redirect()->route('admin.books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */


     public function destroy(Request $request,BooksRepository $bookRepo ,$id)
    {


          // $bookRepo->getBook($id);
        $isDeleted =$bookRepo->destroy($id);
        if (!$isDeleted) {
            return $this->sendResponse([
                'title' => 'Error',
                'message' => 'Error While Deleting',
            ]);
        }
        return $this->sendResponse([
            'title' => 'Success',
            'message' => 'Deleted Successfully',
        ]);

        // $bookRepo->getBook($id);
        // $book = $bookRepo->destroy($id);

        // return redirect()->route('admin.books.index',['book'=>$book]);

            ////////////////////////////////////////
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
    }
}
