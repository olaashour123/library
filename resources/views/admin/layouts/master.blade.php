<!DOCTYPE html>
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
    <link rel="stylesheet" href="{{ asset('admin/dist/css/adminlte.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('admin/dist/css/style.css') }}"> --}}

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
                @include('_msg')
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
                </div>


                <!-- jQuery -->
                <script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
                <!-- Bootstrap 4 -->
                <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
                <script src="{{ asset('admin/plugins/select2/js/select2.full.min.js') }}"></script>
                {{-- <script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.style.js') }}"></script> --}}
                <!-- AdminLTE App -->
                <script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>

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

</html>
