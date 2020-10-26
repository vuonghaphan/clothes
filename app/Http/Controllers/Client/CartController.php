<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\orderDetail;
use App\Models\Product;
use Carbon\Carbon;
use Cart;
use http\Env\Response;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CartController extends Controller
{
    public function addCart($id)
    {

        $product = Product::find($id);
        \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => [
                'image' => $product->img_path,
                'promotion' => $product->promotion
            ]
        ]);
        return response()->json([
            'code' => 200,
            'message' => 'Thêm sản phẩm ' . $product->name . ' Thành công',
            'quantity' => Cart::getTotalQuantity()
        ], 200);
    }

    public function getList()
    {
        $cart = \Cart::getContent();
        return view('client.cart.index', compact('cart'));
    }

    public function updateCart(Request $request)
    {
        if($request->id && $request->quantity){
            $product = Product::find($request->id);
            if ($request->quantity > $product->quantity){
                return response()->json(['code' => 400, 'message'=>'Số lượng sản phẩm không đủ, mời bạn liên hệ trực tiếp cửa hàng'], 200);
            }
            \Cart::update($request->id, array(
                'quantity' => array(
                    'relative' => false,
                    'value' => $request->quantity,
                )
            ));
            $totalCart = \Cart::getTotal();
            $itemSubTotal = \Cart::get($request->id)->getPriceSum();
            return response()->json([
                'code' => 200,
                'message' => 'Cập nhật thành công',
                'totalCart' => number_format($totalCart),
                'itemSubTotal' => number_format($itemSubTotal),
            ], 200);
        }
    }
    public function delCart($id)
    {
        $product = \Cart::get($id)->name;
        \Cart::remove($id);
        $cartTotal = \Cart::getTotal();
        return response()->json([
            'code' => 200,
            'message' => 'Sản phẩm ' . $product . ' đã xóa khỏi giỏ hàng',
            'cartTotal' => number_format($cartTotal)
        ], 200);
    }

    public function checkout()
    {
        return view('client.cart.checkout');
    }
    public function saveOrder(Request $request){
        Try {
            DB::beginTransaction();
            $totalMoney = str_replace('.','',\Cart::getTotal());
            $order = Order::Create([
                'user_id' => Auth::guard('web')->user()->id,
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'totalMoney' => $totalMoney,
                'message' => $request->note,
            ]);
            if ($order){
                foreach (\Cart::getContent() as $product){
                    orderDetail::create([
                        'order_id' => $order->id,
                        'product_id' => $product->id,
                        'quantity' => $product->quantity,
                        'price' => $product->price,
                    ]);
                    $prd = Product::find($product->id);
                    if ($prd->quantity - $product->quantity == 0){
                        $prd->status = 0;
                    }
                    $prd->quantity -= $product->quantity;
                    $prd->save();
                }
                \Cart::clear();
            }
            DB::commit();
            return redirect()->route('complete.cart');
        } Catch(\Exception $exception) {
            DB::rollback();
            Log::error('Message: '. $exception->getMessage(). ' --- line '. $exception->getLine());
        }
    }

    public function complete()
    {
        return view('client.cart.complete');
    }
}
