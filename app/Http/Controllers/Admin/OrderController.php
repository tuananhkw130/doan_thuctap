<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Enums\OrderStatus;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::select('orders.*', 'users.name')
            ->join('users', 'users.id', 'orders.userID')
            ->orderBy('orders.created_at', 'desc')
            ->get();

        return view('admin.order.index', [
            'orders' => $orders,
        ]);
    }


    public function detail($id)
    {
        $order = Order::where('id', $id)->firstOrFail();
        $orderDetail = OrderDetail::select('products.*', 'order_details.quantity', 'order_details.price')
            ->join(
                'products',
                'products.id',
                'order_details.productID'
            )->where('orderID', $order->id)
            ->get();

        return view('admin.order.detail', [
            'order' => $order,
            'orderDetail' => $orderDetail
        ]);
    }

    public function accept($id)
    {
        $user = Auth::user();

        $order = Order::where('status', OrderStatus::ORDER)
            ->where('id', $id)
            ->firstOrFail();

        $order->status = OrderStatus::DELIVERY;
        $order->save();
        return redirect()->route('admin.order.detail', ['id' => $order->id]);
    }

    public function cancel(Request $request, $id)
    {
        $order = Order::where('status', OrderStatus::ORDER)
            ->where('id', $id)
            ->firstOrFail();

        $orderDetails = OrderDetail::where('orderID', $order->id)->get();

        foreach ($orderDetails as $orderDetail) {
            $product = Product::findOrFail($orderDetail->productID);

            $product->quantity += $orderDetail->quantity;
            $product->save();
        }

        $order->status = OrderStatus::CANCEL_ORDER;
        $order->save();
        return redirect()->route('admin.order.detail', ['id' => $order->id]);
    }

    public function listOrderDone()
    {
        $orders = Order::select('orders.*', 'users.name')
            ->join('users', 'users.id', 'orders.userID')
            ->where('status', OrderStatus::DELIVERY)
            ->orderBy('orders.created_at', 'desc')
            ->get();

        return view('admin.order.done', [
            'orders' => $orders,
        ]);
    }

    public function listOrderProcessing()
    {
        $orders = Order::select('orders.*', 'users.name')
            ->join('users', 'users.id', 'orders.userID')
            ->where('status', OrderStatus::ORDER)
            ->orderBy('orders.created_at', 'desc')
            ->get();

        return view('admin.order.processing', [
            'orders' => $orders,
        ]);
    }

    public function listOrderCancel()
    {
        $orders = Order::select('orders.*', 'users.name')
            ->join('users', 'users.id', 'orders.userID')
            ->where('status', OrderStatus::CANCEL_ORDER)
            ->orderBy('orders.created_at', 'desc')
            ->get();

        return view('admin.order.cancel', [
            'orders' => $orders,
        ]);
    }

    public function exportPDF($id)
    {
        $order = Order::where('id', $id)->firstOrFail();
        $orderDetail = OrderDetail::select('products.*', 'order_details.quantity', 'order_details.price')
            ->join('products', 'products.id', 'order_details.productID')
            ->where('orderID', $order->id)
            ->get();

        // Load view chi tiết đơn hàng và truyền dữ liệu
        $pdf = Pdf::loadView('admin.order.pdf', [
            'order' => $order,
            'orderDetail' => $orderDetail,
        ]);

        // Xuất PDF với tên file
        return $pdf->stream('order_' . $order->id . '.pdf');
    }
}
