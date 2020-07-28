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
        <button type="button" class="btn btn-info">Thêm mới</button>
        <div class="row mt">
            <div class="col-md-12">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">Danh sách thành viên</h6>
                </div>
                <div class="content-panel">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên thành viên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Ảnh đại diện</th>
                                <th scope="col">Quyền</th>
                                <th scope="col">Tùy chọn</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Ronaldo</td>
                                <td>Cr7@gmail.com</td>
                                <td>
                                    <img src="img/cr7.jpg" width="90" height="120"></td>
                                <td>Admin</td>
                                <td>
                                    <button class="btn btn-success btn-xs "><i class="fa fa-check "></i></button>
                                    <button class="btn btn-primary btn-xs "><i class="fa fa-pencil "></i></button>
                                    <button class="btn btn-danger btn-xs "><i class="fa fa-trash-o "></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

