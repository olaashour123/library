@extends("admin.layouts.master")

@section('title')
    Add new Authors of BooK
@endsection

@section('css')
    <style>
        .select2-container--default .select2-purple .select2-selection--multiple .select2-selection__choice,
        .select2-purple .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #007bff;
 }
            .select2-container--default .select2-purple .select2-results__option--highlighted[aria-selected], .select2-container--default .select2-purple .select2-results__option--highlighted[aria-selected]:hover{
                background-color: #007bff;



        }

    </style>
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

                {{-- <div class="form-group">
                    <label for="name" class="align col-sm-2 control-label"> My Publisher</label>
                    <div class="col-sm-5">
                        <select name="publishers[]" id="publishers" class="form-control" multiple>
                            <option value=""> My Publisher</option>
                            @foreach ($publishers as $publisher)
                                <option value="{{ $publisher->id }}">
                                    {{ $publisher->name }} </option>
                            @endforeach
                        </select>
                    </div> --}}

                <div class="col-12 col-sm-6" data-select2-id="81">
                    <div class="form-group" data-select2-id="80">
                        <label>My Publisher</label>
                        <div class="select2-purple" data-select2-id="56">
                            <select name="publishers[]" id="publishers" class="select2 select2-hidden-accessible"
                                multiple="" data-placeholder="Select a State" data-dropdown-css-class="select2-purple"
                                style="width: 100%;" data-select2-id="15" tabindex="-1" aria-hidden="true">
                                @foreach ($publishers as $publisher)
                                    <option value="{{ $publisher->id }}">
                                        {{ $publisher->name }} </option>
                                @endforeach
                            </select><span
                                class="select2 select2-container select2-container--default select2-container--above"
                                dir="ltr" data-select2-id="16" style="width: 100%;"><span class="selection"><span
                                        class="select2-selection select2-selection--multiple" role="combobox"
                                        aria-haspopup="true" aria-expanded="false" tabindex="-1" aria-disabled="false">
                                        <ul class="select2-selection__rendered">
                                            <li class="select2-selection__choice" title="Alaska" data-select2-id="64">
                                                <span class="select2-selection__choice__remove"
                                                    role="presentation">×</span>Alaska
                                            </li>
                                            <li class="select2-search select2-search--inline"><input
                                                    class="select2-search__field" type="search" tabindex="0"
                                                    autocomplete="off" autocorrect="off" autocapitalize="none"
                                                    spellcheck="false" role="searchbox" aria-autocomplete="list"
                                                    placeholder="" style="width: 0.75em;"></li>
                                        </ul>
                                    </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                        </div>
                    </div>

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

@section('scripts')
@endsection
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
