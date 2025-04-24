<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistem Pendukung Keputusan</title>

        <link rel="manifest" href="{{asset('/assets/icon/site.webmanifest')}}">
        <link rel="mask-icon" href="{{asset('assets/icon/safari-pinned-tab.svg')}}" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap4.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Bootstrap-->
        <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
        <!-- Datatables-->
        <link rel="stylesheet" href="{{asset('assets/css/datatables.min.css')}}" />
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">

        

    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            @include('template.navbar')
            @include('template.sidebar')
            @yield('content')
            @include('template.footer')

            <!-- Control Sidebar -->
            {{-- <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside> --}}
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- JQuery-->
        <script src="{{asset('assets/js/jquery.min.js')}}"></script>
        <!-- Bootstrap-->
        <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
        <!-- Datatables-->
        <script src="{{asset('assets/js/datatables.min.js')}}"></script>
        <!-- AdminLTE App -->
        <script src="{{asset('dist/js/adminlte.js')}}"></script>

        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap4.js"></script>

        <script>
            $(".sidebar ul li").on('click', function () {
            $(".sidebar ul li.active").removeClass('active');
            $(this).addClass('active');
        });

        $('.open-btn').on('click', function () {
            $('.sidebar').addClass('active');

        });


        $('.close-btn').on('click', function () {
            $('.sidebar').removeClass('active');

        })
        </script>

        @yield('script')
    </body>
</html>