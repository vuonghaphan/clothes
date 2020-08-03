@extends('admin.layouts.master')
@section('content')
<div id="main-content">
    <div class="wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
            </ol>
        </nav>
        
        @can('product_add')
        <a href="{{ route('product.create') }}"><button type="button" class="btn btn-info">Thêm mới</button></a>
        @endcan

        <div class="row mt">
            <div class="col-md-12">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-info">Danh sách sản phẩm</h4>
                </div>
                {{-- <form action="#" class="pull-right mail-src-position">
                    <div class="input-append">
                      <input type="text" class="form-control " placeholder="Search Mail">
                    </div>
                  </form> --}}
                <!-- table -->
                @include('admin.products.components.table-components')
                <!-- end table -->

                <!-- delPrdModal -->
                @include('admin.products.components.del-modal')
                <!-- end DelPrd -->

            </div>
        </div>
    </div>
</div>
@endsection
@push('AdminAjax')

<script src="{{ asset('assets/admin/js/product-ajax.js') }}" type="text/javascript"></script>

@endpush


