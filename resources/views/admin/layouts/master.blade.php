<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
{{-- 
  <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}

  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
 {{-- <link rel="stylesheet" href="{{asset('admin/toastr/toastr.css')}}"> --}}
 <link rel="stylesheet" href="{{asset('admin/toastr/toastr.min.css')}}">

  {{-- <link rel="stylesheet" href="{{asset('admin/plugins/datatbles-bs4/css/dataTables.bootstrap4.css')}}"> --}}
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">

  @yield('css')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('includes.header')

    @include('includes.sidebar')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">@yield('page-big-title')</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">@yield('page-main-title')</a></li>
                            <li class="breadcrumb-item active">@yield('page-sub-title')</li>
                        </ol>
                    </div><!-- /.col -->
                </div>  <!-- /.row -->
            </div><!-- /.container-fluid -->
            {{-- @include('includes._msg')
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif --}}

       @yield('content')

     @include('includes.footer')
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
 
<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
{{-- <script src="{{asset('admin/toastr/toastr.js.map')}}"></script> --}}
<script src="{{asset('admin/toastr/toastr.min.js')}}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>

<script>




  $(document).on('submit', '#ajax_form', function (e) {
    e.preventDefault();
    let form = jQuery(this),
        url = form.attr('action'),
        method = form.attr('method'),
        data = new FormData(form[0]);
    $.ajax({
        url: url,
        type: method,
        data: data,
        contentType: false,
        processData: false,
    }).done(function (data) {
        if (data.status = 200) {
            if (data != null) {
                toastr.success(data.message)
                if (data.url != null) {
                    jQuery('.submit_btn').attr('disabled', true);
                    setTimeout(function () {
                        window.location = data.url;
                    }, 1500);
                }
            }
        } else {
            toastr.error(data.message)
        }
    }).fail(function (data) {
        if (data.status === 422) {
            jQuery('.is-invalid').removeClass('is-invalid');
            jQuery('.invalid-feedback').remove();
            var object = data.responseJSON.errors;
            for (const key in object) {
                if (object.hasOwnProperty(key)) {
                    const element = object[key][0];
                    let input = '';
                    let selector = '';
                    if (key.indexOf('.') > -1) {
                        let keys = key.split('.');
                        let newKeysList = [];
                        for (let index in keys) {
                            if (index == 0) {
                                newKeysList[index] = keys[index];
                                continue;
                            }
                            newKeysList[index] = '[' + keys[index] + ']';
                        }
                        let newName = newKeysList.join('');
                        selector = '[name="' + newName + '"]';
                    } else selector = '[name="' + key + '"]';
                    input = jQuery(selector);
                    input.addClass('is-invalid');
                    let nextSiblings = input.nextAll();
                    if (nextSiblings.length > 0) {
                        jQuery(`<span class="invalid-feedback">  ${element}  </span>`).insertAfter(nextSiblings.last());
                    } else {
                        jQuery(`<span class="invalid-feedback">  ${element}  </span>`).insertAfter(selector);
                    }
                }
            }
            for (let index in data.responseJSON.errors) {
                description = data.responseJSON.errors[index][0];
                break;
            }
            toastr.error(description)
        } else if (data.status === 400) {
            var object = data.responseJSON
            toastr.error(object.message)
        } else if (data.status === 401) {
            toastr.error('الرجاء تسجيل الدخول", "خطأ')
        } else if (data.status === 500) {
            Swal.fire("Server Error", data.responseJSON.message);
        } else {
            Swal.fire("Error", data.responseJSON.message);
        }
    });
});
</script>
@yield('scripts')
</body>
</html>









































































{{-- <!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>AdminLTE 3 | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('admin/dist/css/style.css') }}"> --}}
{{-- 
    <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>

    <link rel="stylesheet" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    @yield('css')

    <style>


    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">



        @include('includes.header')

        @include('includes.sidebar')


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">@yield('page-big-title')</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">@yield('page-main-title')</a></li>
                                <li class="breadcrumb-item active">@yield('page-sub-title')</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
                @include('includes._msg')
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                @yield('content')


            </div>
            <!-- /.content-header -->


            <!-- Main content -->

            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        @include('includes.footer')

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- destroy Modal-->
    <div id="Confirm" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">تأكيد</h4>
                </div>
                <div class="modal-body">
                    <p>هل انت متأكد من الاستمرار في العملية؟</p>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-danger">نعم, متأكد</a>
                    <button type="button" class="btn btn-default" data-dismiss="modal">الغاء الأمر</button>
                </div>
                <!--PopUp Modal-->



                <div id="PopUp" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body">
                            </div>
                        </div>
                    </div>
                </div> --}}

{{-- 
                <!-- jQuery -->
                <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
                <!-- Bootstrap 4 -->
                <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
                <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script> --}}
                {{-- <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.style.js') }}"></script> --}}
                <!-- AdminLTE App -->
                {{-- <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>

                <script src="{{ asset('admin/plugins/bootstrap/js/modal.js') }}"></script>

                <script src="{{ asset('admin/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
                                integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
                                crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
                                integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
                                crossorigin="anonymous"></script>


                @yield('scripts')
                <script>
                    $(function() {
                        /* $(".Confirm").click(function(e){
                              $("#Confirm").modal("show");
                              $("#Confirm .btn-danger").attr("href",$(this).attr("href"));
                              return false;
                              //e.preventDefault();
                          });*/


                        $(".PopUp").click(function(e) {
                            $("#PopUp").modal("show");
                            $("#PopUp .modal-title").html($(this).attr("title"));
                            $("#PopUp .modal-body").load($(this).attr("href"));
                            return false;
                        });

                        $(document).ajaxStart(function() {
                            NProgress.start();
                        });

                        $(document).ajaxStop(function() {
                            NProgress.done();
                        });


                        $(document).ajaxError(function() {
                            NProgress.done();
                        });
                    })
                </script>

                <script>
                    $(function() {

                        $('.select2').select2()

                    })
                </script>

</body>

</html> --}}
