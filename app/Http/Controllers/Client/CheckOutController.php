<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Enums\OrderStatus;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class CheckOutController extends Controller
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
        $cart = Cart::select('carts.*', 'products.price', 'products.name')->join('products', 'products.id', 'carts.productID')
            ->where('userID', $user->id)->get();
        return view('client.checkout.index', [
            'cart' => $cart,
        ], compact('season'));
    }

    public function order(Request $request)
    {
        $user = Auth::user();

        $order = Order::create([
            'userID' => $user->id,
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'address' => $request->address,
            'total' => 0,
            'status' => OrderStatus::ORDER,
            'message' => $request->message,
        ]);

        $dataOrderAdd = [];
        $total = 0;
        $carts = Cart::select('carts.*', 'products.price')->join('products', 'products.id', 'carts.productID')
            ->where('userID', $user->id)->get();
        foreach ($carts as $cart) {
            array_push($dataOrderAdd, [
                'orderID' => $order->id,
                'productID' => $cart->productID,
                'quantity' => $cart->quantity,
                'price' => $cart->price,
            ]);
            $total += $cart->price * $cart->quantity;
        }

        $order->total = $total;
        $order->save();

        Cart::where('userID', $user->id)->delete();

        return redirect()->route('order.index')->with('success', 'Đặt hàng thành công');
    }
}
