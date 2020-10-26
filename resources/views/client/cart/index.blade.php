@extends('client.layouts.master')
@section('content')
    <!-- breadcrumb -->
    <!-- Shoping Cart -->
    <form class="bg0 p-t-75 p-b-85">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 ">
                    <div class="m-l-25 m-r--38 m-lr-0-xl product-cart">
                        <div class="table-cart">
                            @include('client.cart.components.table-cart')
                        </div>

                        <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                            <div
                                class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                <h4>
                                    Cart Totals
                                </h4>
                            </div>
{{--                            <span > Total: </span>--}}
                            <span style="font-size: 20px">Total:<b class="cart-total" style="font-size: 20px"> {{ '$ '. number_format(\Cart::getTotal()) }} </b></span>
                            <a href="{{ route('checkout.cart') }}" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                                Proceed to Checkout
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>
@endsection
@push('clientJs')
    <script>
        $(document).ready(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            function delCart(e) {
                e.preventDefault();
                let id = $(this).data('id');
                let url = $(this).data('url');
                const _price_item_context = $(this)

                $.ajax({
                    type: "delete",
                    url: url,
                    dataType: 'json',
                    success: function (data) {
                        if (data.code === 200) {
                            _price_item_context.parents('.product-cart').find('.cart-total').text(' $ ' +data.cartTotal)
                            toastr.success(data.message, 'Thông báo', {
                                timeOut: 3000
                            })
                            $('.remove-cart' + id).remove();
                        }
                    }
                });
            }

            $('.delCartJS').on('click', delCart);

            function updateCart(e) {
                e.preventDefault();
                let url = $(this).data('url');
                let id = $(this).data('id');
                let quantity = $(this).parents('tr').find('input.quantity').val();
                const _price_item_context = $(this)
                $.ajax({
                    type: 'get',
                    url: url,
                    dataType: 'json',
                    data: {
                        id: id,
                        quantity: quantity,
                    },
                    success: function (data) {
                        if (data.code === 200) {
                            _price_item_context.parents('tr').find('.itemSubTotal').text('$ '+data.itemSubTotal)
                            _price_item_context.parents('.product-cart').find('.cart-total').text(' $ ' +data.totalCart)

                            toastr.success(data.message, 'thông báo', {
                                timeOut: 2000,
                            });
                        }
                        if (data.code === 400) {
                            toastr.error(data.message, "Thông báo", {
                                timeOut: 2000
                            })
                        }
                    }
                })
            }
            $(this).on('click', '.update-cart', updateCart);
        });

    </script>
@endpush
