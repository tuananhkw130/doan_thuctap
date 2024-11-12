<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function index()
    {
        // Tổng số lượng sản phẩm
        $totalProducts = Product::count();

        // Tổng số lượng đơn hàng
        $totalOrders = Order::count();



        // Số lượng đơn hàng hoàn thành
        $completedOrders = Order::where('status', 'completed')->count();

        // Số lượng đơn hàng đang xử lý
        $pendingOrders = Order::where('status', 'pending')->count();

        return view('admin.home.index', compact('totalProducts', 'totalOrders'));
    }
}
