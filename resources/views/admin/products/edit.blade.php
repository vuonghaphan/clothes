@extends('admin.layouts.master')
@section('content')
<div id="main-content">
    <div class="wrapper">
        <div class="col-sm-12 ">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header ">Sửa sản phẩm</h1>
                </div>
            </div>
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"><h4>Sửa sản phẩm</h4></div>
                            <div class="panel-body">
                                <div class="row" style="">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label><span style="color:black">Tên sản phẩm</span></label>
                                            <input type="text" type="text" name="name" value="{{ $product->name }}" class="form-control" />
                                            {{ notifyError($errors,'name') }}
                                        </div>
                                        <div class="form-group">
                                            <label><span style="color:black">Số lượng</label>
                                            <input type="text" name="quantity" value="{{ $product->quantity }}" class="form-control" />
                                            {{ notifyError($errors,'quantity') }}
                                        </div>
                                        <div class="form-group">
                                            <label><span style="color:black">Giá sản phẩm (Giá chung)</label>
                                            <input type="number" name="price" value="{{ $product->price }}" class="form-control" />
                                            {{ notifyError($errors,'price') }}
                                        </div>
                                        <div class="form-group">
                                            <label><span style="color:black">Khuyến mãi</label>
                                            <input type="number" name="promotion" value="{{ $product->promotion }}" placeholder="Nhập giá khuyến mại nếu có" class="form-control" />
                                        </div>
                                        <div class="form-group">
                                            <label><span style="color:black">Miêu tả</label>
                                            <textarea id="editor" name="description"  style="width: 100%;height: 100px;">{{ $product->article }}</textarea>
                                            {{ notifyError($errors,'description') }}
                                        </div>
                                        <div class="form-group">
                                            <label><span style="color:black">Bài viết</label>
                                            <textarea name="article"  style="width: 100%;height: 100px;">{{ $product->article }}</textarea>
                                            {{ notifyError($errors,'article') }}
                                        </div>
                                    </div>
                                    <div class="col-md-4">

                                        <div class="form-group">
                                            <label><span style="color:black">Danh mục</label>
                                            <select name="id_category" class="form-control">
                                                @foreach ($categories as $cat)
                                                <option value="{{ $cat->id }}" {{ $product->id_category == $cat->id ? 'selected' : '' }}> {{ $cat->name }} </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        {{-- <div class="form-group">
                                            <label><span style="color:black">Loại sản phẩm</label>
                                            <select name="category" class="form-control">
                                                <option value="1" selected>Nam</option>
                                                <option value="2">Nữ</option>
                                            </select>
                                        </div> --}}
                                        <div class="form-group">
                                            <label><span style="color:black">Trạng thái</label>
                                            <select name="status" class="form-control">
                                                <option value="1" {{ $product->status == 1 ? 'selected' : '' }} >Còn hàng</option>
                                                <option value="0" {{ $product->status == 0 ? 'selected' : '' }} >Hết hàng</option>
                                                <option value="2" {{ $product->status == 2 ? 'selected' : '' }} >Sắp ra mắt</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label><span style="color:black">Nổi bật</label>
                                            <select name="hot" class="form-control">
                                                <option value="1" {{ $product->hot == 1 ? 'selected' : '' }} >Hot</option>
                                                <option value="0" {{ $product->hot == 0 ? 'selected' : '' }} >Không</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Ảnh minh họa</label><span class="text-danger"> *</span>
                                            <div class="custom-file">
                                                <input name="img" type="file" class="custom-file-input" id="input_img">
                                                <label class="custom-file-label" for="input_img">Choose file</label>
                                            </div>
                                            {{ notifyError($errors,'img') }}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-success" type="submit">
                                    Sửa sản phẩm
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
