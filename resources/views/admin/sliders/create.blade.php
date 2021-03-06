@extends("admin.layouts.master")

@section('title')
    Add new Sliders
@endsection

@section('css')
@endsection


@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>


        <form action="{{ route('admin.sliders.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title">
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <input type="text" class="form-control" id="description" name="description" placeholder="description">
                </div>

                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="exampleInputFile">
                            <label class="custom-file-label" for="image">Choose image</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <div class="checkbox">
                            <label>
                                <input {{ old('status') ? 'checked' : '' }} name="status" type="checkbox"> Status
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="description">URL</label>
                    <input type="text" class="form-control" id="url" name="url" placeholder="url">
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>

        </form>
    </div>

@section('scripts')
@endsection
@endsection
{{-- <form action="admin.authors.store') }}" method="post" enctype= "multiple/form-data "class="form-horizontal">
   @csrf
  <div class="form-group">
    <label for="name" class="align col-sm-2 control-label">?????? ??????????????</label>
    <div class="col-sm-10 col-md-5">
      <input autofocus type="text"  class="form-control" value="{{old('name')}}" id="name" name="name" placeholder="???????? ?????? ??????????????">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input {{old('status')?"checked":""}} name="status" type="checkbox"> ????????
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">??????????</button>
        <a href="/admin/authors" class="btn btn-default">?????????? ??????????</a>
    </div>
  </div>
</form> --}}
