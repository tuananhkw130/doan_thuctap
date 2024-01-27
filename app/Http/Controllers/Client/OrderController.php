<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index() {
        $user = Auth::user();
        $orderList = Order::where('userID', $user->id)->orderBy('id', 'DESC')->get();
        return view('client.order.index', ['orderList' => $orderList]);
    }
}
