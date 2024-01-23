<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function index() {
        $orders = Order::select('orders.*', 'users.name')
            ->join('users', 'users.id', 'orders.userID')
            ->orderBy('orders.id', 'DESC')
            ->get();
        return view('admin.order.index', [
            'orders' => $orders,
        ]);
    }

    public function detail($id) {
        $order = Order::where('id', $id)->firstOrFail();
        $orderDetail = OrderDetail::select('products.*', 'order_details.quantity', 'order_details.price')
            ->join('products', 'products.id', 'order_details.productID')
            ->where('orderID', $order->id)
            ->get();
        return view('admin.order.detail', [
            'order' => $order,
            'orderDetail' => $orderDetail
        ]);
    }
}
