@extends("admin.layouts.master")

@section('title')
    Add new Authors of BooK
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>


        <form action="{{ route('admin.authors.store') }}" method="post" enctype="multipart/form-data">

            @csrf
            @method('post')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label for="mail">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>


                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                </div>

                <div class="form-group">
                    <label for="address">address:</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter address">
                </div>

                <div class="form-group">
                    <label for="name" class="align col-sm-2 control-label"> My Publisher</label>
                    <div class="col-sm-5">
                        <select name="publishers[]" id="publishers" class="form-control" multiple>
                            <option value=""> My Publisher</option>
                            @foreach ($publishers as $publisher)
                                <option value="{{ $publisher->id }}">
                                    {{ $publisher->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <input type="text" value="{{ $author->id }}" name="author" hidden>
                        <div class="form-group">
                            <label>Add publishers</label>
                            <select class="custom-select" name="publishers[]" multiple>
                                @foreach ($allPublishers as $publisher)
                                    <option value="{{ $publisher->id }}">{{ $publisher->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                </div>

                <div class="form-group">
                    <label for="discription">Discription</label>
                    <input type="text" class="form-control" id="discription" name="discription" placeholder="Password">
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
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
{{-- <form action="admin.authors.store') }}" method="post" enctype= "multiple/form-data "class="form-horizontal">
   @csrf
  <div class="form-group">
    <label for="name" class="align col-sm-2 control-label">اسم التصنيف</label>
    <div class="col-sm-10 col-md-5">
      <input autofocus type="text"  class="form-control" value="{{old('name')}}" id="name" name="name" placeholder="ادخل اسم التصنيف">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input {{old('status')?"checked":""}} name="status" type="checkbox"> فعال
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">اضافة</button>
        <a href="/admin/authors" class="btn btn-default">الغاء الامر</a>
    </div>
  </div>
</form> --}}
