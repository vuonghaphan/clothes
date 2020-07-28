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
                        <div class="panel-body">
                            <div class="row" style="">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Tên module</label>
                                        <input type="text" name="code" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Key code</label>
                                        <select name="featured" class="form-control">
                                            <option value="0">Không</option>
                                            <option value="1">Có</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Chọn quyền cha</label>
                                        <select name="featured" class="form-control">
                                            <option value="0">Không</option>
                                            <option value="1">Có</option>
                                        </select>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
