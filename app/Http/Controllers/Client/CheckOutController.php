<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index() {
        $user = Auth::user();
        $cart = Cart::select('carts.*', 'products.price', 'products.name')
            ->join('products', 'products.id', 'carts.productID')
            ->where('userID', $user->id)
            ->get();
        return view('client.checkout.index', [
            'cart' => $cart,
        ]);
    }
}
