@extends('admin.layouts.master')
@push('cssAdmin')
    <style>
        table {
            width: 100%;
            background: white;
            border-collapse: collapse;
        }

        table th {
            font-size: 17px;
            padding: 5px;
        }

        table, th, td {
            border: 1px solid #CCCCCC;
            padding: 5px;
        }

        table td button {
            border-radius: 5px;
            border: 1px solid;
            padding: 3px 5px;
            width: 25px;
        }
        .detail-order {
            width: 60%;
            margin: 0 auto;
            padding-top: 200px;
        }
        .header-modal-detail{
            display: flex;
        }
        .close{
            display: inline;
        }
        .title-order {
            height: 40px;
            background: #4ECDC4;
            font-size: 20px;
            color: #2B2E31;
            line-height: 40px;
            border-radius: 5px 5px 0 0 ;
        }
        .title-cancel-order{
            border-bottom: 2px solid slategrey;
            margin-bottom: 20px;
        }
        .cancel-order{
            background: white;
            width: 50%;
            height: 120px;
            margin: 0 auto;
            font-size: 20px;
            color: black;
            margin-top: 200px;
            border-radius: 5px;
            border: 1px solid #cccccc;
            padding: 5px;
        }
        .cancel-order button{
            margin-top: 10px;
            border-radius: 10px;
            border: 2px solid ;
            height: 40px;
            width: 100px;
            font-size: 13px;
            font-family: "Helvetica Neue";
            text-transform: uppercase;
            font-weight: bold;
            color: white;
        }
        .accept{
            background-color: #00a6b2;
        }
        .close-modal{
            background-color: #f9243f;
        }
        .btn-hanble{
            width: 70px;
            height: 30px;
            /*background-color: #3F3F3F;*/
            color: white;
        }
    </style>
@endpush
@section('content')
    <div id="main-content">
        <div class="wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">đơn hàng</li>
                </ol>
            </nav>
            <div class="row mt">
                <div class="col-md-12">
                    <div class="card-header py-3">
                        <h3 class="m-0 font-weight-bold text-info">Danh sách đơn hàng</h3>
                    </div>
                    <div class="">
                        <table>
                            <tr>
                                <th>Stt</th>
                                <th>Tên</th>
                                <th>Địa chỉ</th>
                                <th>Điện thoại</th>
                                <th>Trạng thái</th>
                                <th>tùy chọn</th>
                            </tr>
                            @forelse($orders as $key => $order )

                                <tr class="rowTable{{ $order->id }}">
                                    <td>{{ $key }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td id="handleJs">
                                        @if($order->status == 2)
                                            <button class="btn-danger btn-hanble">Đã hủy</button>
                                        @elseif($order->status == 1)
                                            <button class="btn-success btn-hanble">Đã thanh toán</button>
                                        @elseif($order->status == 0)
                                            <button class="btn-warning btn-hanble">Chờ xử lí</button>
                                        @endif
                                    </td>
                                    <td id="delOrder">
                                        @can('order_detail')
                                        <button data-url="{{ route('show.order', $order->id) }}"
                                                data-id="{{ $order->id }}" class=" btn-success order-detail"
                                                data-toggle="modal" data-target="#detail-order" >
                                                <i class="fa fa-info "></i>
                                        </button>
                                        @endcan

                                            @if($order->status == 2)
                                                @can('order_delete')
                                                <button data-id="{{ $order->id }}"
                                                        class=" btn-danger del-order btn-del-order" id="delOrdel"
                                                        data-toggle="modal" data-target="#modal-del-order" >
                                                        <i class="fa fa-trash-alt "></i>
                                                </button>
                                                @endcan
                                            @else
                                                @can('order_cancel')
                                                <button data-id="{{ $order->id }}" class=" btn-danger btn-cancel-order"
                                                        id="delOrdel" data-toggle="modal" data-target="#modal-cancel" >
                                                        <i class="fa fa-ban "></i>
                                                </button>
                                                @endcan

                                            @endif

                                    </td>
                                    @empty
                                        <b>chưa có đơn hàng nào</b>
                                    @endforelse
                                </tr>
                        </table>
                    </div>
                    <!-- order detail -->
                    <div style="margin-top: 20px" class=" modal fade detail-order" id="detail-order">
                        <div class="panel-order table-detail-order">
                        </div>
                    </div>
                    <!-- end order detail -->
                    <!-- cancel order -->
                    @can('order_cancel')
                        @include('admin.orders.cancel-modal')
                    @endcan
                    <!-- end cancel order -->
                    <!-- del order -->
                    @can('order_delete')
                        @include('admin.orders.delete-order-modal')
                    @endcan
                    <!-- end del order -->
                </div>
            </div>
        </div>
    </div>


@endsection

@push('AdminAjax')
    <script src="{{ asset('assets/admin/js/order-ajax.js') }}"></script>
@endpush

