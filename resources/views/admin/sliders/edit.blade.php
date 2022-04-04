@extends("admin.layouts.master")


@section('title', 'edit')


@section('content')
    <form action="{{ route('admin.books.update', ['id' => $book->id]) }} " method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-body">

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $book->name }}">
            </div>


            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" class="form-control" id="description" name="description"
                    value="{{ $book->description }}">
            </div>

            <div class="form-group">
                <label for="name">quantity</label>
                <input type="text" class="form-control" id="quantity" name="quantity" value="{{ $book->quantity }}">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price"
                    value="{{ $book->price }}">
                @if ($errors->has('price'))
                    <p class="text-danger">{{ implode(', ', $errors->get('price')) }}</p>
                @endif
            </div>

            <div class="col-12 col-sm-6" data-select2-id="81">
                <div class="form-group" data-select2-id="80">
                    <label>Select Categories</label>
                    <div class="select2-purple">
                        <select name="categories[]" id="category" class="select2 select2-hidden-accessible"
                            multiple="multiple" data-placeholder="Select a category"
                            data-dropdown-css-class="select2-purple" style="width: 100%;">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ $book->categories->pluck('id')->contains($category->id) ? 'selected' : '' }}>
                                    {{ $category->name }} </option>
                            @endforeach
                        </select></span>
                    </div>
                </div>
                <div class="col-12 col-sm-6" data-select2-id="81">
                    <div class="form-group" data-select2-id="80">
                        <label>Select Authors</label>
                        <div class="select2-purple">
                            <select name="authors[]" id="author" class="select2 select2-hidden-accessible"
                                multiple="multiple" data-placeholder="Select a author"
                                data-dropdown-css-class="select2-purple" style="width: 100%;">
                                @foreach ($authors as $author)
                                    <option value="{{ $author->id }}"
                                        {{ $book->authors->pluck('id')->contains($author->id) ? 'selected' : '' }}>
                                        {{ $author->name }} </option>
                                @endforeach
                            </select></span>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label for="name" class="align col-sm-2 control-label"> My Publisher</label>
                    <div class="col-sm-5">
                        <select name="publisher_id" id="publisher_id" class="form-control" multiple="">
                            <option value=""> My Publisher</option>
                            @foreach ($publishers as $publisher)
                                <option value="{{ $publisher->id }}"
                                    {{ $book->publisher->id == $publisher->id ? 'selected' : '' }}>
                                    {{ $publisher->name }} </option>
                            @endforeach
                        </select>
                    </div>



                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="exampleInputFile"
                                    value="{{ $book->image }}">
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
