@extends('admin.layouts.master')
@section('content')
<div id="main-content">
    <div class="wrapper">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="text-black" href="/admin">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Quyền</li>
            </ol>
            <button type="button" class="btn btn-info">Thêm mới</button>
        </nav>
        <div class="row mt">
            <div class="col-md-12">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">Danh sách quyền</h6>
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
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->key_code }}</td>
                                <td>
                                    <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




