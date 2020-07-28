<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
    thêm mới
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    Thêm Loại sản phẩm
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên Loại sản phẩm</label
                        >
                        <input
                            type="text"
                            class="form-control"
                            id="recipient-name"
                        />
                    </div>
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select name="category" class="form-control">
                            <option value="1" selected>Nam</option>
                            <option value="2">Nữ</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                    hủy
                </button>
                <button type="button" class="btn btn-info">Lưu</button>
            </div>
        </div>
    </div>
</div>
