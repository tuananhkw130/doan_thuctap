<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Enums\OrderStatus;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $trangThaiTT = $request->vnp_ResponseCode;
        if ($trangThaiTT == '00') {
            $order_id = $request->vnp_TxnRef;
            Order::where('id', $order_id)
                ->update(['paymentstatus' => 2,]);
        }

        $user = Auth::user();
        $orderList = Order::where('userID', $user->id)->orderBy('id', 'DESC')->get();
        return view('client.order.index', ['orderList' => $orderList]);
    }
    public function detail($id)
    {
        $order = Order::where('id', $id)->where('userID', Auth::id())->firstOrFail();
        $orderDetail = OrderDetail::select('products.*', 'order_details.quantity', 'order_details.price')
            ->join('products', 'products.id', 'order_details.productID')
            ->where('orderID', $order->id)
            ->get();
        return view('client.order.detail', [
            'order' => $order,
            'orderDetail' => $orderDetail
        ]);
    }
    public function cancel($id)
    {
        $order = Order::where('id', $id)
            ->where('userID', Auth::id())
            ->where('status', OrderStatus::ORDER)
            ->firstOrFail();

        $orderDetails = OrderDetail::where('orderID', $order->id)->get();

        foreach ($orderDetails as $orderDetail) {
            $product = Product::findOrFail($orderDetail->productID);

            $product->quantity += $orderDetail->quantity;
            $product->save();
        }

        $order->status = OrderStatus::CANCEL_ORDER;
        $order->message = 'Người dùng đã hủy đặt hàng';
        $order->save();

        return redirect()->route('order.index');
    }

}
