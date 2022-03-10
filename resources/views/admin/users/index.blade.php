@extends('admin.layouts.master')


@section('title')
    Users
@endsection
@section('subtitle')
    يمكنك اضافة حذف وتعديل التصنيفات
@endsection


@section('content')
    <form class="row">



        <div class="col-sm-3">
            <a class="btn" href="/admin/users/create">
                <i class="fa fa-plus"></i> Create User</a>
        </div>
    </form>
    <br>
    @if ($users->count() > 0)
        <table class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th width="10%">Username</th>
                    <th width="5%">Name</th>
                    <th width="5%"> Email</th>
                    <th width="5%">Date</th>
                    <th width="5%">stutas</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td><input type="checkbox" value="{{ $user->id }}" class='cbStatus'
                                {{ $user->status ? 'checked' : '' }} /></td>
                        <td>
                            <a href="{{ route('admin.users.edit', ['id' => $user->id]) }}" class="btn btn-xs btn-primary">
                                <i class="glyphicon glyphicon-edit"></i>
                            </a>

                            <a href="{{ route('admin.users.password', ['id' => $user->id]) }}"
                                class="btn btn-xs btn-primary">
                                Change Password
                            </a>

                            <form class="inline" action="{{ route('admin.users.destroy', ['id' => $user->id]) }}"
                                method="put">
                                @csrf
                                @method('post')
                                <button onclick="return
                                         confirm('هل انت متأكد من الاستمرار في العملية؟')"
                                    class="btn Confirm btn-xs btn-danger">
                                    <i class="glyphicon glyphicon-trash"></i></button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <br>
        <div class="alert alert-warning"><b>نأسف</b>, لا يوجد بيانات لعرضها ...</div>
    @endif
    {{ $users->links() }}
@endsection

@section('js')
    <script>
        $(function() {
            $(".cbStatus").click(function() {
                var id = $(this).val();
                $.get("/admin/users/" + id + "/status");
            });
        });
    </script>
@endsection


{{-- <html lang="en">
<head>
    <title>Users</title>
</head>
<body>
@if (Session::has('data'))
    {{ Session::get('data')['title'] }} - {{ Session::get('data')['code'] }} - {{ Session::get('data')['message'] }}
@endif
<table>
    <thead>
        <tr>
            <th>Username</th>
            <th>Name</th>
            <th>Email</th>
            <th>Date</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($users as $user)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->username }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html> --}}
