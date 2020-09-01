@extends('admin.layouts.master')
@section('content')
<div id="main-content">
    <div class="wrapper">
        <div class="col-sm-12 ">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header ">Thêm sản phẩm</h1>
                </div>
            </div>
            <form action="{{ route('product.add.image') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"><h4>Thêm sản phẩm</h4></div>
                            <div class="panel-body">
                                <div class="row" style="">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label><span style="color:black">Sản phẩm</label>
                                            <select name="id_product" class="form-control">
                                                @foreach ($product as $data)
                                                <option value="{{ $data->id }}">{{ $data->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Chọn ảnh</label><span class="text-danger"> *</span>
                                            <div class="custom-file">
                                                <input name="image[]" type="file" multiple class="custom-file-input" id="input_img">
                                                <label class="custom-file-label" for="input_img"></label>
                                            </div>
                                            {{ notifyError($errors,'img') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-success" type="submit">
                                    Thêm ảnh
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

