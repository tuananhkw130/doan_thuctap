<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;
use App\Models\Post;
use App\Enums\OrderStatus;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalUser = User::where('role', 1)->count();
        $completedOrders = Order::where('status', OrderStatus::DELIVERY)->count();
        $doanhthu = Order::where('status', OrderStatus::DELIVERY)->sum('total');
        $pendingOrders = Order::where('status', OrderStatus::ORDER)->count();
        $cancelOrders = Order::where('status', OrderStatus::CANCEL_ORDER)->count();
        $totalPost = Post::count();

        return view(
            'admin.home.index',
            compact('totalProducts', 'totalOrders', 'totalUser', 'completedOrders', 'pendingOrders', 'totalPost', 'doanhthu', 'cancelOrders')
        );
    }

    public function doanhThu(Request $request)
    {
        $date = $request->input('date');
        $month = $request->input('month');

        // Query doanh thu theo ngày hoặc tháng
        $query = Order::query()->where('status', OrderStatus::DELIVERY);

        if ($date) {
            $query->whereDate('created_at', $date);
        } elseif ($month) {
            $monthNumber = date('m', strtotime($month)); // Chuyển từ YYYY-MM thành m
            $year = date('Y', strtotime($month));
            $query->whereMonth('created_at', $monthNumber)
                ->whereYear('created_at', $year);
        }

        $revenues = $query->selectRaw('DATE(created_at) as date, SUM(total) as revenue')
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        return view('admin.home.doanhthu', compact('revenues', 'date', 'month'));
    }
}
