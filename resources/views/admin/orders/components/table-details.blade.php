<div class="title-order">Chi tiết đơn hàng</div>
<table>
    <tr>
        <th>Tên sản phẩm</th>
        <th>Ảnh</th>
        <th>Số lượng</th>
        <th>Giá</th>
    </tr>
    @forelse($order as $item)
    <tr>
        <td >{{ $item->product->name }}</td>
        <td ><img src="{{ $item->product->img_path }}" style="width: 70px; height: 100px"></td>
        <td >{{ $item->quantity }}</td>
        <td >{{ '$ ' .number_format($item->price) }}</td>
    </tr>
    @empty
        <span>Đơn hàng không tồn tại</span>
    @endforelse
</table>
<button class="close-modal-detail" data-dismiss="modal"> Đóng</button>
