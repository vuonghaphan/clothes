
<div class="modal fade" id="editCatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Sửa danh mục <span class="titleEditCatJS text-secondary"></span></h5>
                <input class="idEditCatJS" type="hidden">
            </div>
            <div class="modal-body">
                <form role="form">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên danh mục</label>
                        <input type="text" class="form-control nameEditCatJS" id="recipient-name" name="name" placeholder="Nhập tên danh mục">
                        <span class="text-danger font-italic errorEditCatJS d-none"></span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">hủy</button>
                <button type="button" class="btn btn-info btn-updateCatJs" >Lưu</button> {{-- <button type="button" class="btn btn-success btn-saveAddCatJS" data-url="{{ route('category.store') }}">Lưu</button>                --}}
            </div>
        </div>
    </div>
</div>
