@extends('admin.layouts.master')
@section('title', 'Users')

@section('css')
    
@endsection

@section('content')

<form class="row">

    <div class="col-sm-3">
        <a class="btn" href="/admin/users/create">
            <i class="fa fa-plus"></i> Create User</a>
    </div>
</form>
{{-- 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div>  <!-- /.container-fluid -->
    </section>

    @if(Session::has('data'))
        {{ Session::get('data')['title'] }} - {{ Session::get('data')['code'] }} - {{ Session::get('data')['message'] }}
    @endif --}}

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control  searchable" id="name" name="name" placeholder="Name">
      </div>


        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Index</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body " >
                <table class="datatable table  table-head-fixed table-hover text-nowrap  text-center">
                  <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Date</th>
                        <th>Actions</th>

                    </tr>
                  </thead>
                  <tbody>
                      
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection


@section('scripts')
{{-- <script src="{{asset('admin/main.js')}}"></script>
<script>
  function deleteItem(id){
    $.ajax({
      url:     '/admin/users/' + id,
      type:    'DELETE',
      data:    { src: 'getproduct' },
      success: function(response) {
         window.location.href = "/admin/users";
      }
  });
  }
</script> --}}

<script>
   jQuery(document).ready(function () {
        var table = $('.datatable').DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            bLengthChange: false,
            pageLength: 20,
            ajax: {
                url:"{{ route('admin.users.index') }}",
                data: function (d) {
                    d.name = $('#name').val(),
                    d.email = $('#email').val()
                    // d.status = $('#status').val()
                },
            },
            columns: [
                { data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false, searchable: false },
                {data: 'name', name: 'name'},
                {data: 'username', name: 'username'},
                {data: 'email', name: 'email'},
                {data: 'created_at', name: 'created_at'},
                {data: 'actions', name: 'actions'}
            ],
        });
        $('.searchable').on('input change', function () {
            table.draw();
        });
    
 // delete  in Ajax request.

        
        $(document).on('click', '.deletebtn', function(e){
          e.preventDefault();
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
              let a = $(this).attr("data_url");
              $.ajax({
                type: 'get',
                url: a,

                success: function (data) {
                  if (data.status = 200) {
                    if (data != null) {
                      toastr.success(data.message);
                      table.draw();
                    }
                  } else {
                      toastr.error(data.message)
                  }
                },
              });
            }
          })
          
        });
  });
</script>
@endsection


{{-- 
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
@endsection --}}


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


