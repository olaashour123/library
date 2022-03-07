<?php

namespace App\Http\Controllers\Admin;

use session;
use App\Models\Author;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\PublisherRequest;
use App\Repositories\Admin\PublishersRepository;


class PublisherController extends Controller
{

    /**public function __construct() {
        $this->middleware('admin')->except('index');
    }*/


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PublishersRepository  $publisherRepo)
    {
        //   dd(112);
       $publishers=$publisherRepo->getPublishers(20);
        return response()->view('admin.publishers.index', ['publishers' => $publishers]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin.publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublisherRequest $request)
    {

         //dd('444');
          $data = $request->validated();

           $image =$data['image'];
           $imageName=Carbon::now()->format('Y_m_d_h_i')  .  '.' . $image->getClientOriginalExtension();
           $image->storeAs('public/publishers',$imageName,['disk ' =>'public']);

           $data['image'] = 'publishers/' . $imageName;

        $add = Publisher::create($data);
       

        if (!$add) {
            $request->session()->flash('data', [
                'title' => 'Error',
                'code' => 400,
                'message' => 'Error While Adding'
            ]);
            return redirect()->route('admin.publishers.index');
        }

        $request->session()->flash('data', [
            'title' => 'success',
            'code' => 200,
            'message' => 'Added Successfully'
        ]);
        return redirect()->route('admin.publishers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show(PublishersRepository $publisherRepo, $id)
    {
        $publisher = $publisherRepo->getPublisher($id);
        $authors = $publisher->authors;
        $allAuthors = Author::all();
        return response()->view('admin.publishers.show', ['publisher' => $publisher, 'authors' => $authors, 'allAuthors' => $allAuthors]);
    }


    public function addAuthors(Request $request, PublishersRepository $publisherRepo)
    {
        $publisher = $publisherRepo->getPublisher($request->publisher);
        $publisher->authors()->sync($request->authors);
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( PublishersRepository  $publisherRepo, $id)
    {
       $publisher = $publisherRepo->getPublisher($id);
        return view('admin.publishers.edit', compact('publisher'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublisherRequest $request, PublishersRepository  $publisherRepo , $id)
      {
        $data = $request->validated();

         $publisher = $publisherRepo->getPublisher($id);

        if (isset($data['image'])) {

            $image = $data['image'];
            $imageName = Carbon::now()->format('Y_m_d_h_i')  .  '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/categories', $imageName, ['disk ' =>'public']);
            // dd($imageName);
            $data['image'] = 'public/categories/' . $imageName;
            Storage::disk('public')->delete($publisher->image);
        }else{
            $data['image'] = $publisher->image;
        }



        $update = $publisherRepo->update($id,$data);

        if (!$update) {
            $request->session()->flash('data', [
                'title' => 'Error',
                'code' => 400,
                'message' => 'Error While Updating'
            ]);
            return redirect()->route('admin.publishers.index');
        }

        $request->session()->flash('data', [
            'title' => 'success',
            'code' => 200,
            'message' => 'Updated Successfully'
        ]);
          return redirect()->route('admin.publishers.index');

        // $IsExists = Publisher::where("image",$request["image"]);
        //  if($IsExists){


        //  }
        // return redirect()->route('admin.publisher.index');

    }

    public function destroy(Request $request,
                            PublishersRepository  $publisherRepo,
                            $id)
    {
        $publisherRepo->getPublisher($id);
        $delete = $publisherRepo->destroy($id);
        return redirect()->route('admin.publishers.index');
        if (!$delete) {
            $request->session()->flash('data', [
                'title' => 'Error',
                'code' => 400,
                'message' => 'Error While Deleting'
            ]);
        }
        return redirect()->route('admin.publishers.index');

        $request->session()->flash('data', [
            'title' => 'success',
            'code' => 200,
            'message' => 'Deleted Successfully'
        ]);

         return redirect()->route('admin.publishers.index');
    }


          public function delete(  PublishersRepository  $publisherRepo, $publisher, $id){
        $publisher = $publisherRepo->getPublisher($publisher);
        $publisher->authors()->detach($id);
        return redirect()->back();
    }






}
