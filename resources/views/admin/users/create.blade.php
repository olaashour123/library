@extends("admin.layouts.master")
@section('title', 'Add new Users')

@section('css')
    
@endsection

@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>


        <form  id="ajax_form"  action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data"> 

            @csrf
            @method('post')
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                 
                </div>
                <div class="form-group">
                    <label for="username">UserName</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter UserName">
                  
                </div>


                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                   
                </div>

                <div class="form-group">
                    <label for="password_confirmation">PasswordConformation:</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Enter password">
                      
                </div>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                  {{-- @error('email')
                     <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                  @enderror --}}
                </div>


                <div class="form-group">
                    <label for="status">Status:</label>
                    <select id="status" name="status">
                        <option value="1">Enabled</option>
                        <option value="0">Disabled</option>
                    </select>
                </div>


                <div class="card-footer">
                    <button type="submit" class="btn btn-primary submit_btn" >Submit</button>
                </div>
        </form>
    </div>
   
@endsection

@section('scripts')
    
@endsection

{{-- <script>

$('#SubmitCreateProductForm').click(function(e) {
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "{{ route('admin.users.store') }}",
        method: 'post',
        data: {
            name: $('#name').val(),
            price: $('#username').val(),
            description: $('#email').val(),
        },
        success: function(result) {
            if(result.errors) {
                $('.alert-danger').html('');
                $.each(result.errors, function(key, value) {
                    $('.alert-danger').show();
                    $('.alert-danger').append('<strong><li>'+value+'</li></strong>');
                });
            } else {
                $('.alert-danger').hide();
                $('.alert-success').show();
                $('.datatable').DataTable().ajax.reload();
                setInterval(function(){ 
                    $('.alert-success').hide();
                    $('#CreateProductModal').modal('hide');
                    location.reload();
                }, 2000);
            }
        }
    });
});


</script> --}}



{{-- ///////////////// --}}

{{-- <html lang="en">

<head>
    <title>Create User</title>
    <style>
        form {
            /* Center the form on the page */
            margin: 0 auto;
            width: 400px;
            /* Form outline */
            padding: 1em;
            border: 1px solid #CCC;
            border-radius: 1em;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        form li+li {
            margin-top: 1em;
        }

        label {
            /* Uniform size & alignment */
            display: inline-block;
            width: 90px;
            text-align: right;
        }

        input,
        textarea {
            /* To make sure that all text fields have the same font settings
               By default, textareas have a monospace font */
            font: 1em sans-serif;

            /* Uniform text field size */
            width: 300px;
            box-sizing: border-box;

            /* Match form field borders */
            border: 1px solid #999;
        }

        input:focus,
        textarea:focus {
            /* Additional highlight for focused elements */
            border-color: #000;
        }

        textarea {
            /* Align multiline text fields with their labels */
            vertical-align: top;

            /* Provide space to type some text */
            height: 5em;
        }

        .button {
            /* Align buttons with the text fields */
            padding-left: 90px;
            /* same size as the label elements */
        }

        button {
            /* This extra margin represent roughly the same space as the space
               between the labels and their text fields */
            margin-left: .5em;
        }

    </style>
</head>

<body>
    <form action="{{ route('admin.users.store') }}" method="post">
        <ul>
            <li>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name">
            </li>
            <li>
                <label for="name">Username:</label>
                <input type="text" id="username" name="username">
            </li>
            <li>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </li>
            <li>
                <label for="password_confirmation">Password Confirmation:</label>
                <input type="password" id="password_confirmation" name="password_confirmation">
            </li>
            <li>
                <label for="mail">E-mail:</label>
                <input type="email" id="email" name="email">
            </li>
            <li>
                <label for="msg">Status:</label>
                <select id="status" name="status">
                    <option value="1">Enabled</option>
                    <option value="0">Disabled</option>
                </select>
            </li>
            <li class="button">
                <button type="submit">add</button>
            </li>
        </ul>
        {{ csrf_field() }}
    </form>
</body>

</html> --}}
{{-- //////////// ///////////////*********************************************//////////////////--}}


{{-- 
@extends('admin.layout.master')

@section('title', 'Create User')

@section('styles')
    
@endsection

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Create User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Create User</h3>
                  </div>
                  <!-- /.card-header -->

                  @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                  @endif

                  <!-- form start -->
                  <form id="ajax_form" method="POST" action="{{route('admin.users.store')}}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Password confirmation</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password confirmation">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select class="custom-select" id="status" name="status">
                            <option value="1">Enabled</option>
                            <option value="0">Disabled</option>
                            </select>
                        </div>
                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary submit_btn">Add</button>
                    </div>
                  </form>
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
    
@endsection --}}