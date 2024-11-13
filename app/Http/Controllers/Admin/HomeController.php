<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order;
use App\Models\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();

        $totalOrders = Order::count();

        $totalUser = User::where('role', 1)->count();

        $completedOrders = Order::where('status', 'completed')->count();

        $pendingOrders = Order::where('status', 'pending')->count();

        return view('admin.home.index', compact('totalProducts', 'totalOrders', 'totalUser', 'completedOrders', 'pendingOrders'));
    }
}
