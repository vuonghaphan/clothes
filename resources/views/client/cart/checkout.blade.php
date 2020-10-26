@extends('client.layouts.master')
@push('cssClient')
    <style>
        button {
            background-color: cadetblue;
            width: 70px;
            height: 30px;
            border-radius: 5px;
            font-size: 12px;
            color: white;
        }

        .breadcrumbs {
            width: 100%;
            height: 100px;
            margin-top: 50px;
            line-height: 100px;
        }

        .container-fluid {
            height: 50px;
        }

        .row-breadcrumbs {
            /*line-height: 50px;*/
            width: 90%;
            margin: 0 auto;
        }

        .row-breadcrumbs ul {
            display: flex;
        }

        .row-breadcrumbs ul li {
            padding: 0px 2px;
        }

        .row-breadcrumbs ul li a {
            color: #2B2E31;
        }

        .content {
            display: flex;
            justify-content: center;
            margin-bottom: 100px;
        }

        .order-info {
            width: 500px;
            height: auto;
            border: 1px solid cadetblue;
            border-radius: 5px;
        }

        .order {
            margin: 0 25px;
        }

        .order-detail {
            width: 500px;
            height: auto;
            border: 1px solid cadetblue;
            border-radius: 5px;
        }

        .panel-header {
            padding: 0 5px;
            background: cadetblue;
            height: 40px;
            line-height: 40px;
            border-bottom: 1px solid cadetblue;
            color: black;
        }

        .panel-body {
            padding: 10px;
        }

        .body-detail {
            padding: 20px;
            display: flex;
            justify-content: space-between;
        }

        .body-detail img {
            width: 70px;
            height: 100px;
        }

        .name-product b {
            display: block;
        }

        .total {
            border-top: 1px solid cadetblue;
            padding: 20px;
        }

        .total span {
            float: right;
        }
    </style>
@endpush
@section('content')
    <div class="breadcrumbs">
        <div class="container-fluid">
            <div class="row-breadcrumbs">
                <ul>
                    <li>
                        <a href="#" style="font-weight: bold">Trang chủ/</a>
                    </li>
                    <li>
                        <a href="#" style="font-weight: bold">Giỏ hàng/</a>
                    </li>
                    <li>
                        <a href="#">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="order order-info">
            <form action="{{ route('saveOrder.cart') }}" method="post">
                @csrf
                <div class="panel-header"> Thông tin thanh toán</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div><strong>Tên người mua: </strong></div>
                        <div>
                            <input type="text" name="name" class="form-control" value="{{ Auth::guard('web')->user()->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div><strong>Địa chỉ: </strong></div>
                        <div>
                            <input type="text" name="address" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div><strong>Số điện thoại: </strong></div>
                        <div>
                            <input type="text" name="phone" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div><strong>Ghi chú: </strong></div>
                        <div>
                            <textarea name="note" style="height: 50px; width: 100% ; border: 1px solid cadetblue"></textarea>
                        </div>
                    </div>
                    <div class="button">
                        <button type="submit" class=" ">Xác nhận</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="order order-detail">
            <div class="panel-header">Thông tin sản phẩm</div>
            @foreach(\Cart::getContent() as $item)
                <div class="body-detail">
                    <div class="avatar">
                        <img src="{{ asset($item->attributes->image) }}" alt="">
                    </div>
                    <div class="name-product">
                        <b>{{ $item->name }}</b>
                        <span>số lương: {{ $item->quantity }}</span>
                    </div>
                    <div class="price">
                        <span>{{ '$ '.number_format($item->price) }}</span>
                    </div>
                </div>
            @endforeach
            <div class="total">
                <b>Tổng tiền({{ \Cart::getTotalQuantity(). ' Sản Phẩm' }})</b>
                <span>{{ '$ '.number_format(\Cart::getTotal()) }} </span>
            </div>
        </div>
    </div>
@endsection
