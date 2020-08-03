@can('category_add')
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#addCatModal" data-whatever="@mdo">thêm mới</button>
@endcan

<div class="modal fade" id="addCatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm danh mục</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên danh mục</label>
                        <input type="text" class="form-control nameAddCatJS" id="recipient-name" name="name" placeholder="Nhập tên danh mục">
                        <span class="text-danger font-italic errorAddCatJS d-none"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">hủy</button>
                <button type="button" class="btn btn-info btn-saveAddCatJs" data-url="{{ route('category.store') }}">Lưu</button> {{-- <button type="button" class="btn btn-success btn-saveAddCatJS" data-url="{{ route('category.store') }}">Lưu</button>                --}}
            </div>
        </div>
    </div>
</div>
