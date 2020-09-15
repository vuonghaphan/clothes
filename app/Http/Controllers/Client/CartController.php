<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addCart($id)
    {
        $product = Product::find($id);
        $cart = [
            'id' => $id,
            'name' => $product->name,
            'quantity' => 1,
            'price' => $product->price,
        ];
        Cart::add();
        return response()->json(['code'=> 200, 'message'=> 'Thêm vào giỏ hàng thành công'], 200);
    }







    public function complete()
    {
        return view('client.cart.complete');
    }
}
