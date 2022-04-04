@extends("admin.layouts.master")

@section('title', 'Books')


@section('css')
    <link rel="stylesheet" href="{{ asset('admin/dist/css/style.css') }}">
@endsection


@section('content')


    <div class="col-sm-3">
        <a href="/admin/books/create">
            <i class="fa fa-plus"></i>Create Book</a>
        {{-- class="btn btn-success " --}}
    </div>
    <br>
    <div class="card-body">
        @if ($books->count()>0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="3%">#</th>
                        <th width="10%">Name</th>
                        <th width="10%">description</th>
                        <th width="10%">quantity</th>
                        <th width="10%">price</th>
                        <th width="10%"> Date</th>
                        <th width="10%">image</th>
                        <th width="10%">publishers</th>
                        <th width="10%"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $book)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->description }}</td>
                            <td>{{ $book->quantity }}</td>
                            <td>{{ $book->price }}</td>
                            <td>{{ $book->updated_at }}</td>
                            <td>
                                <img class="img-circle img-bordered-sm" width="65" height="65"
                                    src="{{ url(Storage::url($book->image)) }}" alt="">
                            </td>
                            <td>
                                {{ $book->publisher->name ?? 'N/A' }}
                            </td>

                            <td>

                                {{-- <a href="{{ route('admin.books.show', ['id' => $book->id]) }}"
                                    class="btn PopUp btn-info btn-xs" id="PopUp">
                                    <i class="fas fa-regular fa-eye"></i> --}}

                                </a><br>
                                {{-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
                                    Modal
                                </button> --}}

                                {{-- <a title="" href="/admin/orders/my_orders/{{ $o->id }}" class="btn PopUp btn-info btn-xs">

                    <i class="glyphicon glyphicon-list"></i>      class="btn btn-xs btn-primary" --}}


                                <br>


                                <a href="{{ route('admin.books.edit', ['id' => $book->id]) }}"
                                    class="btn btn-xs btn-primary">
                                    <i class="fas fa-solid fa-bars"></i>
                                </a>

                                <form class="inline"
                                    action="{{ route('admin.books.destroy', ['id' => $book->id]) }}" method="PUT">
                                    @csrf
                                    @method('post')
                                    <button onclick="return confirm('هل انت متأكد من الاستمرار في العملية؟')"
                                        class="btn Confirm btn-xs btn-danger">
                                        <i class="fas fa-solid fa-trash"></i></button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
@else
    <br>
    <div class="alert alert-warning"><b>نأسف</b>, لا يوجد بيانات لعرضها ...</div>
    @endif



    {{ $books->links() }}

    @section('scripts')@endsection

@endsection
