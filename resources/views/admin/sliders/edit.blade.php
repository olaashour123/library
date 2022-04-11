@extends("admin.layouts.master")


@section('title', 'edit')


@section('content')
    <form action="{{ route('admin.sliders.update', $slider->id) }} " method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">

            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $slider->title }}">
            </div>


            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="{{ $slider->description }}">
            </div>

            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="exampleInputFile"
                            value="{{ $slider->image }}">
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
                            <input {{ $slider->status ? 'checked' : '' }} name="status" type="checkbox">Status
                        </label>
                    </div>
                </div>
            </div>

            <li class="button">
                <button type="submit">Edit</button>
            </li>
        </div>
    </form>

@endsection
