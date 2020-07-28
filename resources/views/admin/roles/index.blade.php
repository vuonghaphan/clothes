@extends('admin.layouts.master')
@section('content')
<div id="main-content">
    <div class="wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Vai trò</li>
            </ol>
        </nav>
        <a href="{{ route('role.create') }}"><button type="button" class="btn btn-info">Thêm mới</button></a>
        <div class="row mt">
            <div class="col-md-12">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-info">Danh sách vai trò</h4>
                </div>
                <div class="content-panel">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col"><span style="color:black">STT</span></th>
                                <th scope="col"><span style="color:black">Tên vai trò</span></th>
                                <th scope="col"><span style="color:black">Mô tả</span></th>
                                <th scope="col"><span style="color:black">Tùy chọn</span></th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach ($role as $key => $data)
                            <tr class="rowTable{{ $data->id }}">
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->display_name }}</td>
                                <td>
                                    <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                    <a href="{{ route('role.edit',$data->id) }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                    <button class="btn btn-danger btn-xs delRoleJS"data-toggle="modal"
                                    data-target="#delRoleModal"
                                    data-id={{ $data->id }}
                                    data-name={{ $data->name }}>
                                    <i class="fa fa-trash-o "></i></button></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include('admin.roles.components.del-modal')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('AdminAjax')
<script src="{{ asset('assets/admin/js/role-ajax.js') }}"></script>
@endpush
