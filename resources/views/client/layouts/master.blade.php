<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href={{ asset('assets/client/images/icons/favicon.png')}} />
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/vendor/bootstrap/css/bootstrap.min.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/fonts/iconic/css/material-design-iconic-font.min.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/fonts/linearicons-v1.0.0/icon-font.min.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/vendor/animate/animate.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/vendor/css-hamburgers/hamburgers.min.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/vendor/animsition/css/animsition.min.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/vendor/select2/select2.min.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/vendor/daterangepicker/daterangepicker.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/vendor/slick/slick.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/vendor/MagnificPopup/magnific-popup.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/vendor/perfect-scrollbar/perfect-scrollbar.css')}}">
   <!--===============================================================================================-->
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/css/util.css')}}">
   <link rel="stylesheet" type="text/css" href="{{ asset('assets/client/css/main.css')}}">
    {!! Assets::renderHeader() !!}
    <!--===============================================================================================-->
</head>

<body class="animsition">

<!-- Header -->
    @include('client.layouts.header')
<!--end header-->

<!-- Cart -->
    @include('client.layouts.components.cart')
<!-- end cart -->

<!--content-->
    @yield('content')
<!-- end content -->

<!-- Footer -->
    @include('client.layouts.footer')
<!-- end footer -->
<!-- Back to top -->
<div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
</div>

<!-- Modal Detail Product -->
    @include('client.layouts.components.modal-detail-prd')
<!-- end Modal Detail Product-->

<!--===============================================================================================-->
<script src="{{ asset('assets/client/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
{{--<!--===============================================================================================-->--}}
<script src="{{ asset('assets/client/vendor/animsition/js/animsition.min.js')}}"></script>
{!! Assets::renderFooter() !!}

@stack('clientJs')

<script src="{{ asset('assets/client/vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{ asset('assets/client/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

<script src="{{ asset('assets/client/vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{ asset('assets/client/vendor/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ asset('assets/client/vendor/slick/slick.min.js')}}"></script>
<script src="{{ asset('assets/client/js/slick-custom.js')}}"></script>
<script src="{{ asset('assets/client/vendor/parallax100/parallax100.js')}}"></script>
{{--<script>--}}
{{--    $('.parallax100').parallax100();--}}
{{--</script>--}}


<script src="{{ asset('assets/client/vendor/isotope/isotope.pkgd.min.js')}}"></script>

<script src="{{ asset('assets/client/vendor/sweetalert/sweetalert.min.js')}}"></script>

<script src="{{ asset('assets/client/js/main.js')}}"></script>

</body>

</html>
