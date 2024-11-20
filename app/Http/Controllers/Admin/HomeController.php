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

}
