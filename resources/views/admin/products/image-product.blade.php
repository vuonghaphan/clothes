@extends('admin.layouts.master')

@section('css')
    <style>
        .center{
            height: 250px;
        }
        .img{
        }
    </style>
@endsection

@section('content')
    <div id="main-content">
        <div class="wrapper">
            <div class="col-sm-12 ">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header ">Ảnh sản phẩm</h1>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-info">
                                <div class="panel-heading"><h4>Ảnh sản phẩm {{ $product->name }}</h4></div>
                                <div class="panel-body">
                                    <div class="clearfix"></div>
                                    <div class="row">
                                        <div class=" col-md-12">
                                            <h5> Ảnh sản phẩm</h5>
                                        </div>

                                        @if ($countImage > 0)

                                        @foreach(($product->images) as $image)

                                        <div class="col-md-3 center">
                                                <img class="img-thumbnail rounded float-lg-right img " style="height: 250px" style="width: 200px" src="{{ $image->image_path}}">
                                                <a href="{{ route('product.delete.image', $image->id) }}"
                                                        class="btn btn-danger delImg">
                                                    <i class="fa fa-trash-o ">
                                                    </i>
                                                </a >
                                        </div>
                                        @endforeach

                                        @else
                                        <div class="col-md-3">
                                            <p> Sản phẩm hiện chưa có thêm ảnh </p>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endsection
@push('AdminAjax')
    <script type="javascript">
        $('.delImg').on('click', function (){
           return alert('loz');
        });
    </script>
@endpush

