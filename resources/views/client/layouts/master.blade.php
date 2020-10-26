<!DOCTYPE html>
<html lang="en">

<head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="/">
    <link rel="icon" type="image/png" href={{ asset('assets/client/images/icons/favicon.png')}} />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    {!! Assets::renderHeader() !!}
    <link href="{{asset('assets/admin/css/toastr.css')}}" rel="stylesheet">
    @stack('cssClient')
</head>

<body class="animsition">

<!-- Header -->
    @include('client.layouts.header')
<!--end header-->

<!-- sidebar -->
@include('client.layouts.components.profile')
<!-- end sidebar -->

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
<!-- end back top -->

<!-- Modal Detail Product -->
    @include('client.layouts.components.modal-detail-prd')
<!-- end Modal Detail Product-->

<script src="{{ asset('assets/client/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
@stack('clientJs')

<script src="{{ asset('assets/client/vendor/animsition/js/animsition.min.js')}}"></script>

{!! Assets::renderFooter() !!}

<script src="{{ asset('assets/admin/lib/toastr.min.js') }}"></script>

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


</body>

</html>
