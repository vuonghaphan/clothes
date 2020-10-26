<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\orderDetail;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::get();
        return view('admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = orderDetail::with('product')->where('order_id',$id)->get();
        $html = view('admin.orders.components.table-details', compact('order'))->render();
        return response()->json(['code'=>200, 'html'=> $html], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function cancelOrder($id){
        $order = Order::find($id);
        $order->status = 2;
        $order->save();
        $orderDetails = orderDetail::where('order_id',$id)->get();
        foreach ($orderDetails as $orderDetail){
            $product = Product::find($orderDetail->product_id);
            $product->quantity += $orderDetail->quantity;
            if ($product->status == 0){
                $product->status = 1;
            }
            $product->save();
        }
        return response()->json(['message'=>'Hủy đơn hàng thành công'],200);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::find($id)->delete();
        orderDetail::where('order_id', $id)->delete();
        return response()->json(['message'=> 'Xóa đơn hàng thành công'],200);
    }
}
