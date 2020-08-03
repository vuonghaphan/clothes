@extends('admin.layouts.master')
@section('content')
<div id="main-content">
    <div class="wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quyền</li>
            </ol>

            @can('permission_add')
            <a href="{{ route('permission.create') }}"><button type="button" class="btn btn-info">Thêm mới</button></a>
            @endcan

        </nav>
        <div class="row mt">
            <div class="col-md-12">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-info">Danh sách quyền</h4>
                </div>
                <div class="content-panel">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên quyền</th>
                                <th scope="col">key code</th>
                                <th scope="col">Tùy chọn</th>
                            </tr>
                        </thead>
                        @foreach ($permission as $key => $data)
                        <tbody>
                            <tr class="rowTable{{ $data->id }}">
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->key_code }}</td>
                                <td>

                                    @can('permission_edit')
                                    <a href="{{ route('permission.edit', $data->id) }}"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                    @endcan

                                    @can('permission_delete')
                                    <button class="btn btn-danger btn-xs delPer" data-toggle="modal" data-target="#delPerModal"
                                        data-id="{{ $data->id }}" data-name="{{ $data->name }}">
                                        <i class="fa fa-trash-o "></i>
                                    </button>
                                    @endcan

                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    @include('admin.permissions.components.del-modal')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('AdminAjax')
<script src="{{ asset('assets/admin/js/permission-ajax.js') }}"></script>
@endpush


