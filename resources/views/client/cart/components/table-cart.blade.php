<table class="table-shopping-cart ">
    <tr class="table_head">
        <th class="column-1">Product</th>
        <th class="column-2"></th>
        <th class="column-3">Price</th>
        <th class="column-4">Quantity</th>
        <th class="column-5">Total</th>
        <th class="column-6">Update</th>
        <th class="column-7">Cancel</th>
    </tr>
    @forelse($cart as $item)
        <tr class="table_row product-cart remove-cart{{ $item->id }}">
            <td class="column-1">
                <div class="how-itemcart1">
                    <img src="{{ asset($item->attributes->image) }}" alt="IMG">
                </div>
            </td>
            <td class="column-2" style="font-size: 17px; font-weight: bold">{{ $item->name }}</td>
            <td class="column-3">{{ '$ '.number_format($item->price) }}</td>
            <td class="column-4" style="width: 100px">
                <div class="wrap-num-product flex-w m-l-auto m-r-0">
                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                        <i class="fs-16 zmdi zmdi-minus"></i>
                    </div>
                    <input class="mtext-104 cl3 txt-center num-product quantity" type="number" name="numproduct"
                           data-id="{{ $item->id }}"
                           value="{{ $item->quantity }}">
                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m update-cart">
                        <i class="fs-16 zmdi zmdi-plus"></i>
                    </div>
                </div>
            </td>
            <td class="column-5 itemSubTotal">{{ '$ '.number_format($item->getPriceSum()) }}</td>
            <td>
                <button class="btn btn-success update-cart" data-url="{{ route('update.cart') }}" data-id="{{ $item->id }}" type="button">update</button>
            </td>
            <td>
                <button type="button" data-id="{{ $item->id }}" data-url="{{ route('del.cart', $item->id) }}" class="btn btn-dark delCartJS">X</button>
            </td>
            @empty
                <p style="font-weight: bold; font-size: 20px;">Giỏ hàng bạn trống!</p>
        </tr>
    @endforelse
</table>
