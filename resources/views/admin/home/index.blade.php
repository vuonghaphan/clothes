@extends('admin.layouts.master', ['title'=>'Home'])
@section('content')
<div id="main-content">
    <div class="wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Danh mục</li>
            </ol>
        </nav>


        <!-- table -->
        <div class="row mt ">
            <div class="col-md-9">
                <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold text-info">Danh sách danh mục</h3>
                </div>
                <div class="card-body">
                    <span style="font-size: 100px">xin chào {{ auth()->user()->name }}</span>
                </div>
            </div>
        </div>
        <!-- end-table -->

        <!-- edit-CatModal -->
        {{-- @include('admin.categories.components.edit-modal') --}}
        <!-- end-Edit-CatModal -->

        <!-- deCatModal -->
        {{-- @include('admin.categories.components.del-modal') --}}
        <!-- end-delCatModal-->
    </div>
</div>
@endsection



