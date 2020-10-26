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
    <script>
        function addCart(e){
            e.preventDefault();
            let url = $(this).data('url');
            $.ajax({
                type: "GET",
                url: url,
                dataType: 'json',
                success: function (data){
                    if (data.code === 200 ){
                        toastr.success(data.message, "Thông báo", {
                            timeOut: 10000
                        });
                        $(".show-cart").text(data.quantity);
                    }
                },
                error: function (){
                }
            });
        }
        $(function (){
            $('.add-to-cart').on('click', addCart);
        });
    </script>
@endpush
