@extends("admin.layouts.master")


@section('title', 'edit')


@section('content')
    <form action="{{ route('admin.authors.update', ['id' => $author->id]) }} " method="post"
        enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $author->name }}">
            </div>

            <div class="form-group">
                <label for="mail">E-mail:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $author->email }}">
            </div>


            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password">
            </div>

            <div class="form-group">
                <label for="address">address:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $author->address }}">
            </div>

            <div class="form-group">
                <label for="name" class="align col-sm-2 control-label"> My Publisher</label>
                <div class="col-sm-5">
                    <select name="publishers[]" id="publishers" class="form-control" multiple>
                        <option value=""> My Publisher</option>
                        @foreach ($publishers as $publisher)
                            <option value="{{ $publisher->id }}"
                                {{ $author->publishers->pluck('id')->contains($publisher->id) ? 'selected' : '' }}>
                                {{ $publisher->name }} </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                    <label for="discription">Discription</label>
                    <input type="text" class="form-control" id="discription" name="discription"
                        value="{{ $author->discription }}">
                </div>




                <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="image" id="exampleInputFile"
                                value="{{ $author->image }}">
                            <label class="custom-file-label" for="image">Choose image</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text">Upload</span>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $author->name }}">
            </div>
            <div class="form-group">
                <label for="discription">Discription</label>
                <textarea type="text" class="form-control" id="discription" name="discription"
                    value="{{ $author->discription }}">
                    </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" value="{{ $author->image }}"
                            id="exampleInputFile">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                    <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                    </div>
                </div>
            </div> --}}
        </div>

        <li class="button">
            <button type="submit">Edit</button>
        </li>
    </form>
    </div>
@endsection
