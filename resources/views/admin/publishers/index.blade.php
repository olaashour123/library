@extends("admin.layouts.master")

@section('title', 'Publishers')



@section('content')


    <div class="col-sm-3">
        <a href="/admin/publishers/create">
            <i class="fa fa-plus"></i>Create publisher</a>
        {{-- class="btn btn-success " --}}
    </div>
    <br>
    <div class="card-body">
        @if ($publishers->count() > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="3%">#</th>
                        <th width="10%">Name</th>
                        <th width="10%">Email</th>
                        <th width="10%">password</th>
                        <th width="10%">Address</th>
                        <th width="10%">image</th>
                        <th width="10%">آخر تعديل</th>
                        <th width="10%"></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($publishers as $publisher)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $publisher->name }}</td>
                            <td>{{ $publisher->email }}</td>
                             <td>{{ $publisher->password }}</td>
                              <td>{{ $publisher->address }}</td>
                            <td>
                                <img class="img-circle img-bordered-sm" width="65" height="65"
                                    src="{{ url(Storage::url($publisher->image)) }}" alt="">
                            </td>
                            <td>{{ $publisher->updated_at }}</td>
                            <td>

                                   <a href="{{ route('admin.publishers.show', ['id' => $publisher->id]) }}"
                                    class="btn PopUp btn-info btn-xs" id="PopUp">
                                    <i class="fas fa-regular fa-eye"></i>

                                </a>
                                <a href="{{ route('admin.publishers.edit', ['id' => $publisher->id]) }}"
                                    class="btn btn-xs btn-primary">
                                    <i class="fas fa-solid fa-bars"></i>
                                </a>

                                <form class="inline"
                                    action="{{ route('admin.publishers.destroy', ['id' => $publisher->id]) }}"
                                    method="put">
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
            <br>

    </div>
@else
    <br>
    <div class="alert alert-warning"><b>نأسف</b>, لا يوجد بيانات لعرضها ...</div>
    @endif
    {{ $publishers->links() }}


@endsection



