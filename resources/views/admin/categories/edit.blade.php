@extends("admin.layouts.master")


@section('title', 'edit')


@section('content')
    <form action="{{ route('admin.categories.update', ['id' => $category->id]) }}" method="post"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
            </div>
            <div class="form-group">
                <label for="description">Discription</label>
                <textarea type="text" class="form-control" id="description" name="description"
                    value="{{ $category->discription }}">
                    </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" value="{{ $category->image }}"
                            id="exampleInputFile">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div>
        </div>

        <li class="button">
            <button type="submit">Edit</button>
        </li>
    </form>
    </div>
@endsection
