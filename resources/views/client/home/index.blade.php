@extends('client.layouts.master')
@section('content')
    <!-- Slider -->
    @include('client.home.components.slide')
    <!-- end slide  -->

    <!-- Banner -->
    @include('client.home.components.banner')
    <!-- end banner  -->

    <!-- Product -->
    @include('client.home.components.product')
    <!-- end product  -->
@endsection
@push('clientJs')
    <script type="javascript">
        $(this).on("click", ".detailPrd", function () {
            $(".js-name-detail").text($(this).data("name"));
            $(".pricePrd").val($(this).data("price"));
            $(".descriptPrd").text($(this).data("description"));
        });
    </script>
@endpush
