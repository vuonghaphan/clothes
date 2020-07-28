@extends('admin.layouts.master')
@section('content')
<div id="main-content">
    <div class="wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thành viên</li>
            </ol>
        </nav>
        <a href="{{ route('member.create') }}"><button type="button" class="btn btn-info">Thêm mới</button></a>

        <!-- table -->
        @include('admin.members.components.table-components')
        <!-- end table -->

        <!-- del-model -->
        @include('admin.members.components.del-modal')
        <!-- end del-modal -->

    </div>
</div>
@endsection
@push('AdminAjax')
<script src="{{ asset('assets/admin/js/member-ajax.js') }}"></script>
@endpush

