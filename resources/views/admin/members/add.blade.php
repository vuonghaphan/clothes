@extends('admin.layouts.master')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
<div id="main-content">
    <div class="wrapper">
        <div class="col-sm-12 ">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header ">Thêm thành viên</h1>
                </div>
            </div>
            <form action="{{ route('member.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">Thêm thành viên</div>
                            <div class="panel-body">
                                <div class="row" style="">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Tên thành viên</label><span class="text-danger"> *</span>
                                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" />
                                            {{ notifyError($errors,'name') }}
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" name="email" class="form-control" />
                                            {{ notifyError($errors,'email') }}
                                        </div>
                                        <div class="form-group">
                                            <label>Mật khẩu</label>
                                            <input type="password" name="password" class="form-control" />
                                            {{ notifyError($errors,'password') }}
                                        </div>
                                        <div class="form-group">
                                            <label>Nhập lại mật khẩu</label>
                                            <input type="password" name="re_password" class="form-control" />
                                            {{ notifyError($errors,'password') }}
                                        </div>
                                    </div>
                                    <div class=" col-md-4 form-group">
                                        <label><span style="color:black">Vai trò</label>
                                            <select name="role_id[]" class="form-control select2_init" multiple="multiple">
                                                <option value=""></option>
                                                @foreach($role as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Ảnh đại diện</label><span class="text-danger"> *</span>
                                        <div class="custom-file">
                                            <input name="avatar" type="file" class="custom-file-input" id="input_img">
                                            <label class="custom-file-label" for="input_img">Choose file</label>
                                            {{ notifyError($errors,'avatar') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-success" name="add-product" type="submit">
                                    Thêm thành viên
                                </button>
                                        <button class="btn btn-danger" type="reset">
                                    Huỷ bỏ
                                </button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('select2')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="{{ asset('assets/admin/member/add.js') }}" ></script>
@endpush


