<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <title></title>

    <!-- Favicons -->
    <link href="{{asset('assets/admin/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/admin/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Bootstrap core CSS -->
    @yield('css')
    <link href="{{asset('assets/admin/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{asset('assets/admin/lib/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/zabuto_calendar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/lib/gritter/css/jquery.gritter.css')}}" />
    @stack('cssAdmin')
    <!-- Custom styles for this template -->
    <link href="{{asset('assets/admin/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/toastr.css')}}" rel="stylesheet">
    <link href="{{asset('assets/admin/css/style-responsive.css')}}" rel="stylesheet">
    <script src="{{asset('assets/admin/lib/chart-master/Chart.js')}}"></script>
    <script src="https://kit.fontawesome.com/840d445b42.js" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

<body>
    <section id="container">

        <!--header start-->
        @include('admin.layouts.topbar')
        <!-- end header -->

        <!--sidebar start-->
        @include('admin.layouts.sidebar')
        <!--sidebar end-->

        <!--MAIN CONTENT -->
        @yield('content')
        <!--end main -->

        <script src="{{asset('assets/admin/lib/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/admin/lib/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/admin/lib/bootstrap/js/bootstrap.min.js')}}"></script>
        <script class="include" type="text/javascript" src="{{asset('assets/admin/lib/jquery.dcjqaccordion.2.7.js')}}"></script>
        <script src="{{asset('assets/admin/lib/jquery.scrollTo.min.js')}}"></script>
        <script src="{{asset('assets/admin/lib/jquery.nicescroll.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/lib/common-scripts.js')}}"></script>
        <!-- this page -->
        <script src="{{asset('assets/admin/lib/toastr.min.js')}}"></script>

        @stack('AdminAjax')
        @if (session('success'))
            <script type="text/javascript">
                toastr.success('{{ session('success') }}', "Thông báo", {timeOut: 3000});
            </script>
        @endif
        @if (session('error'))
            <script type="text/javascript">
                toastr.error('{{ session('error') }}', "Thông báo", {timeOut: 3000});
            </script>
        @endif
        @if (session('warning'))
            <script type="text/javascript">
                toastr.warning('{{ session('warning') }}', "Thông báo", {timeOut: 3000});
            </script>
        @endif
        @stack('select2')
</body>

</html>
