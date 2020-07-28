@extends('admin.layouts.master') @section('content')
<div id="main-content">
    <div class="wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a class="text-black" href="/admin">Trang chủ</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Loại sản phẩm
                </li>
            </ol>
        </nav>
        <!--addproductType-->
        @include('admin.productType.add-modal.blade')
        <!-- end addProductType -->
        <div class="row mt">
            <div class="col-md-12">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">
                        Danh sách sản phẩm
                    </h6>
                </div>
                <div class="content-panel">
                    <!-- table ProductType -->
                    @include('admin.productType.components.table-components')
                    <!-- end Table PRT -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
