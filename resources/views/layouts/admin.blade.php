<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title>DISTO - Admin</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ asset('/bower_components/disto_template/images/favicon.jpg') }}" type="image/x-icon">
        <!-- Stylesheets-->
        <link href="{{ asset('/bower_components/disto_template/admin/css/styles.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('/bower_components/disto_template/admin/css/main.css') }}" rel="stylesheet" type="text/css" media="all" />
        <link href="{{ asset('/bower_components/disto_template/admin/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" media="all" crossorigin="anonymous"/>
        <link href="{{ asset('/bower_components/disto_template/css/sweetalert2.css') }}" rel="stylesheet" type="text/css" media="all" crossorigin="anonymous"/>
        <script src="{{ asset('/bower_components/disto_template/admin/js/all.min.js') }}"></script>
    </head>
    <body class="sb-nav-fixed">
        @include('layouts.header_admin')
        <div id="layoutSidenav">
            @include('layouts.sidebar_admin')
            <div id="layoutSidenav_content">
                @yield('main_content')
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Disto Website 2020</div>
                            <div>
                                <a href="#">{{ trans('app.about_us') }}</a>
                                &middot;
                            </div>
                            <div>
                                <a href="#">{{ trans('app.private_policy') }}</a>
                                &middot;
                            </div>
                            <div>
                                <a href="#">{{ trans('app.community') }}</a>
                                &middot;
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <div id="go-top">
            <a href="#go-top"><i class="fa fa-angle-up"></i></a>
        </div>
        </div>
        <script src="{{ asset('/bower_components/disto_template/admin/js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('/bower_components/disto_template/admin/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('/bower_components/disto_template/admin/js/scripts.js') }}"></script>
        <script src="{{ asset('/bower_components/disto_template/admin/js/Chart.min.js') }}"></script>
        <script src="{{ asset('/bower_components/disto_template/admin/js/chart-area-demo.js') }}"></script>
        <script src="{{ asset('/bower_components/disto_template/admin/js/chart-bar-demo.js') }}"></script>
        <script src="{{ asset('/bower_components/disto_template/admin/js/cjquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('/bower_components/disto_template/admin/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('/bower_components/disto_template/admin/js/datatables-demo.js') }}"></script>
        <script src="{{ asset('/bower_components/disto_template/admin/js/main.js') }}"></script>
        <script src="{{ asset('/bower_components/disto_template/js/sweetalert2.js') }}"></script>
    </body>
</html>
