@extends("admin.layouts.master")

@section('title', 'Carts')


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
        @if ($carts->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="3%">#</th>
                        <th width="10%">book_id</th>
                        <th width="10%">customer_id</th>
                        <th width="10%">quantity</th>
                        <th width="10%">price</th>
                        <th width="10%">آخر تعديل</th>
                        <th width="10%"></th>
                        

                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $cart)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $cart->book_id }}</td>
                            <td>{{ $cart->customer_id }}</td>
                            <td>{{ $cart->quantity }}</td>
                            <td>{{ $cart->price }}</td>
                            <td>{{ $author->updated_at }}</td>
                            <td>

                                {{-- <a href="{{ route('admin.authors.show', ['id' => $author->id]) }}"
                                    class="btn PopUp btn-info btn-xs" id="PopUp">
                                    <i class="fas fa-regular fa-eye"></i>

                                </a><br> --}}
                                {{-- <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-xl">
                                    Modal
                                </button> --}}

                                {{-- <a title="" href="/admin/orders/my_orders/{{ $o->id }}" class="btn PopUp btn-info btn-xs">

                             <i class="glyphicon glyphicon-list"></i>    class="btn btn-xs btn-primary" --}}

                                <a href="{{ route('admin.s.edit', ['id' => $author->id]) }}"
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
