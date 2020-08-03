@extends('admin.layouts.master')
@section('content')
<div id="main-content">
    <div class="wrapper">
        <div class="col-sm-12 ">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header ">Thêm quyền</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">Thêm quyền</div>
                        <form action="{{ route('permission.store') }}" method="POST">
                            @csrf
                            <div class="panel-body">
                                <div class="row" style="">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Tên module</label>
                                            <input type="text" name="name" class="form-control"/>
                                            {{ notifyError($errors,'name') }}

                                        </div>
                                        <div class="form-group">
                                            <label>Key code</label>
                                            <select name="key_code" class="form-control">
                                                <option value="">Chọn key_code</option>
                                                @foreach(config('permissions.key_code') as $data)
                                                <option value="{{ $data }}">{{ $data }}</option>
                                                @endforeach
                                            </select>
                                            {{ notifyError($errors,'key_code') }}
                                        </div>
                                        <div class="form-group">
                                            <label>Chọn quyền cha</label>
                                            <select name="parent_id" class="form-control">
                                                <option value="0">Chọn quyền cha</option>
                                                {{!! $html !!}}
                                            </select>
                                            {{ notifyError($errors,'parent_id') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-success" name="add-product" type="submit">
                                    Thêm mới
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
