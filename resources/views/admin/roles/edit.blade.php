@extends('admin.layouts.master')

@section('css')
<style>
    .addPer {
        border-style: groove;
        /* border-color: coral; */
        border-width: 1px;
        padding: 5px;
        margin-bottom: 20px;
    }
</style>
@endsection

@section('content')
<div id="main-content">
    <div class="wrapper">
        <div class="col-sm-12 ">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header ">Thêm vai trò</h1>
                </div>
            </div>
            <form action="{{ route('role.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">Thêm vai trò</div>
                            <div class="panel-body">
                                <div class="row" style="">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label><span style="color:black">Tên vai trò</span></label>
                                            <input type="text" name="name" value="{{ $role->name }}" class="form-control" />
                                            {{ notifyError($errors,'name') }}
                                        </div>
                                        <div class="form-group">
                                            <label><span style="color:black">Mô tả</label>
                                            <textarea name="display_name" style="width: 100%;height: 100px;">{{ $role->display_name }}</textarea>
                                            {{ notifyError($errors,'display_name') }}
                                        </div>
                                    </div>
                                </div>
                                <!-- per -->
                                @foreach ($permissionsParent as $permissionsParentTtem)
                                    <div class="check primary mb-3 col-md-12 addPer " >
                                        <div class="">
                                            <label>
                                                <input type="checkbox" value="" class="checkbox_wrapper">
                                            </label> Module {{ $permissionsParentTtem->name }}
                                        </div>
                                        <div class="row">
                                            @foreach ($permissionsParentTtem->permissionsChildrents as $permissionsChildrentsItem)
                                            <div class="text-primary col-md-3 bottom">
                                                <label>
                                                    <input type="checkbox" value="{{ $permissionsChildrentsItem->id }}" name="permission_id[]"
                                                    {{ $permissionsChecked->contains('id', $permissionsChildrentsItem->id) ? 'checked' : '' }} class="checkbox_childrent">
                                                    {{ $permissionsChildrentsItem->name }}
                                                </label>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                                <!-- end per -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <button class="btn btn-success" name="" type="submit">
                                    Sửa vai trò
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
@push('AdminAjax')
<script>
    $('.checkbox_wrapper').on('click', function(){
        $(this).parents('.check').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
    });
</script>
@endpush

