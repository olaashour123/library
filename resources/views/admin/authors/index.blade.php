@extends("admin.layouts.master")

@section('title', 'Authors')


@section('css')
    <link rel="stylesheet" href="{{ asset('admin/dist/css/style.css') }}">
@endsection


@section('content')


    <div class="col-sm-3">
        <a href="/admin/authors/create">
            <i class="fa fa-plus"></i>Create Author</a>
        {{-- class="btn btn-success " --}}
    </div>
    <br>
    <div class="card-body">
        @if ($authors->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="3%">#</th>
                        <th width="10%">Name</th>
                        <th width="10%">Email</th>
                        <th width="10%">password</th>
                        <th width="10%">Address</th>
                        <th width="10%">image</th>
                        <th width="10%">publishers</th>
                        <th width="10%">آخر تعديل</th>
                        <th width="10%"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($authors as $author)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $author->name }}</td>
                            <td>{{ $author->email }}</td>
                            <td>{{ $author->password }}</td>
                            <td>{{ $author->address }}</td>
                            <td>
                                <img class="img-circle img-bordered-sm" width="65" height="65"
                                    src="{{ url(Storage::url($author->image)) }}" alt="">
                            </td>
                            <td>
                                @foreach ($author->publishers as $publisher)
                                    {{ $publisher->name }}
                                @endforeach
                            </td>
                            <td>{{ $author->updated_at }}</td>
                            <td>

                                <a href="{{ route('admin.authors.show', ['id' => $author->id]) }}"
                                    class="btn PopUp btn-info btn-xs" id="PopUp">
                                    <i class="fas fa-regular fa-eye"></i>

                                </a><br>
                                {{-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
                                    Modal
                                </button> --}}

                                {{-- <a title="" href="/admin/orders/my_orders/{{ $o->id }}" class="btn PopUp btn-info btn-xs">

                             <i class="glyphicon glyphicon-list"></i>    class="btn btn-xs btn-primary" --}}

                                <a href="{{ route('admin.authors.edit', ['id' => $author->id]) }}"
                                    class="btn btn-xs btn-primary">
                                    <i class="fas fa-solid fa-bars"></i>
                                </a>

                                <form class="inline"
                                    action="{{ route('admin.authors.destroy', ['id' => $author->id]) }}" method="POST">
                                    @csrf
                                    @method('put')
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



    {{ $authors->links() }}

    @section('scripts')@endsection

@endsection
