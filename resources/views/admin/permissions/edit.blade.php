@extends('admin.layouts.master') @section('content')
<div id="main-content">
    <div class="wrapper">
        <div class="col-sm-12 ">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header ">Sửa quyền</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h4>Sửa quyền</h4>
                        </div>
                        <form action="{{ route('permission.update', $permission->id) }}" method="POST">
                            @csrf @method('PUT')
                            <div class="panel-body">
                                <div class="row" style="">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Tên quyền</label>
                                            <input type="text" name="name" class="form-control" value="{{ $permission->name }}" />
                                        </div>
                                        <div class="form-group">
                                            <label>Key code</label>
                                            <select name="key_code" class="form-control">
                                                <option value="0">Chọn key_code</option>
                                                @foreach (config('permissions.key_code') as $data)
                                                <option {{ $permission->key_code == $data? 'selected' : '' }} value="{{ $data }}">{{ $data }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Chọn quyền cha</label>
                                            <select name="parent_id" class="form-control">
                                                <option value="0">Chọn quyền cha</option>
                                                {{!! $html !!}}
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-success" type="submit">
                                            Lưu
                                        </button>
                                        <button class="btn btn-danger" type="reset">
                                            Huỷ bỏ
                                        </button>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection