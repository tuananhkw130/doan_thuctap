<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Enums\OrderStatus;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $currentMonth = Carbon::now()->month;
        if (in_array($currentMonth, [11, 12, 1])) {
            $season = 'winter';
        } elseif (in_array($currentMonth, [8, 9, 10])) {
            $season = 'autumn';
        } else {
            $season = 'other';
        }

        $user = Auth::user();
        $orderList = Order::where('userID', $user->id)->orderBy('id', 'DESC')->get();
        return view('client.order.index', ['orderList' => $orderList], compact('season'));
    }
}
