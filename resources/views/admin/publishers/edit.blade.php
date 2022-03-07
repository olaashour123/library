@extends("admin.layouts.master")


@section('title', 'edit')


@section('content')
    <form action="{{ route('admin.publishers.update', ['id' => $publisher->id]) }} " method="post"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $publisher->name }}">
        </div>

        <div class="form-group">
            <label for="mail">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $publisher->email }}">
        </div>


        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
        </div>

        <div class="form-group">
            <label for="address">address:</label>
            <input type="text" class="form-control" id="address" name="address" value="{{ $publisher->address }}">
        </div>

        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="exampleInputFile"
                        value="{{ $publisher->image }}">
                    <label class="custom-file-label" for="image">Choose image</label>
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
