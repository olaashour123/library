<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Author;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Http\Requests\Admin\AuthorRequest;
use App\Http\Requests\Admin\PublisherRequest;
use App\Repositories\Admin\AuthorsRepository;
use Illuminate\Support\Facades\Storage;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AuthorsRepository  $authorRepo)
    {
            //dd(112);
        // $publisher = $request->publishers();
       $authors=$authorRepo->getAuthors(20);
    //    $authors->authors()->with('publishers');

        return response()->view('admin.authors.index', ['authors' => $authors ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publishers=Publisher::all();
         return response()->view('admin.authors.create',['publishers' => $publishers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(AuthorRequest $request,AuthorsRepository  $authorRepo)
    {
        //  $publisher = $request->publishers();
        // dd('444');
          //    $authors=Author::find('id');
          $data = $request->validated();

        //    $publisher= Publisher::select('name', 'id');
        // $author= $publisher->authors()->create( $data );
        // $publisher = explode(',', $request->input('publisher_id'));
        // $author->syncPublisher($publisher);


        // $authors=Author::find('id');
        // $publishers->publishers()->attach($authors);

           $image =$data['image'];
           $imageName=Carbon::now()->format('Y_m_d_h_i')  .  '.' . $image->getClientOriginalExtension();
           $image->storeAs('/Authors',$imageName,['disk' =>'public']);

           $data['image'] = 'Authors/' . $imageName;



        $add = $authorRepo->store($data);

        $add->publishers()->sync($data['publishers']);

        if (!$add) {
            $request->session()->flash('data', [
                'title' => 'Error',
                'code' => 400,
                'message' => 'Error While Adding'
            ]);
            return redirect()->route('admin.authors.index');
        }

        $request->session()->flash('data', [
            'title' => 'success',
            'code' => 200,
            'message' => 'Added Successfully'
        ]);
        return redirect()->route('admin.authors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(AuthorsRepository $authorRepo, $id)
    {

        // dd(123);

        $author= $authorRepo->getAuthor($id);
        $publishers = $author->publishers;
        $allPublishers = Publisher::all();
        return response()->view('admin.authors.show', ['author' => $author, 'publishers' => $publishers, 'allPublishers' => $allPublishers]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthorsRepository  $authorRepo,$id)
    {
        $author = $authorRepo->getAuthor($id);
       $publishers=Publisher::all();
        return view('admin.authors.edit',['author' => $author, 'publishers'=>$publishers]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, AuthorsRepository  $authorRepo , $id)
    {
         $data = $request->validated();

         $author = $authorRepo->getAuthor($id);
        $author->publishers()->sync($data['publishers']);


        if (isset($data['image'])) {

            $image = $data['image'];
            $imageName = Carbon::now()->format('Y_m_d_h_i')  .  '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/categories', $imageName, ['disk ' =>'public']);
            // dd($imageName);
            $data['image'] = 'public/categories/' . $imageName;
            Storage::disk('public')->delete($author->image);
            }else {
            $data['image'] = $author->image;
        }


        $update = $authorRepo->update($id,$data);

        if (!$update) {
            $request->session()->flash('data', [
                'title' => 'Error',
                'code' => 400,
                'message' => 'Error While Updating'
            ]);
            return redirect()->route('admin.authors.index');
        }

        $request->session()->flash('data', [
            'title' => 'success',
            'code' => 200,
            'message' => 'Updated Successfully'
        ]);
          return redirect()->route('admin.authors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
     public function destroy(Request $request,
                            AuthorsRepository  $authorRepo,
                            $id)
    {
        $authorRepo->getAuthor($id);
        $author = $authorRepo->destroy($id);

        return redirect()->route('admin.authors.index' ,['author' =>  $author]);


    }
    public function delete(AuthorsRepository  $authorRepo, $author, $id){
        $author = $authorRepo->getAuthor($author);
        $author->publishers()->detach($id);
        return redirect()->back();
    }




    // public function getPublishers(AuthorsRepository $authorRepo, $id)
    // {
    //     $author= $authorRepo->getAuthor($id);
    //     $publishers = $author->publishers;
    //     $allPublishers = Publisher::all();
    //     return response()->view('admin.authors.show', ['author' => $author, 'publishers' => $publishers, 'allPublishers' => $allPublishers]);
    // }

    public function addPublishers(Request $request, AuthorsRepository $authorRepo)
    {
        // dd(123);
        $author = $authorRepo->getAuthor($request->author);
        $author->publishers()->syncWithoutDetaching($request->publishers);
        return redirect()->back();
    }



}




 //$doctor = Doctor::find($doctorId);
        // $services = $doctor->services;  //doctor services

        // $doctors = Doctor::select('id', 'name')->get();
        // $allServices = Service::select('id', 'name')->get(); // all db serves

        // return view('doctors.services', compact('services', 'doctors', 'allServices'));
        // $authors = Author::find($id);
        // $publishers = $authors->publishers;
        //  $publishers = Publisher::select('name', 'id');
        //   $authors = Author::select('name', 'id');
        // return response()->view('admin.authors.show',['publishers'=> $publishers]);
