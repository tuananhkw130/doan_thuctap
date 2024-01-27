<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index() {
        $cart = Cart::select('products.*', 'carts.quantity')
            ->join('products', 'products.id', 'carts.productID')
            ->where('carts.userID', Auth::id())
            ->get();

        return view('client.cart.index', [
            'cartItems' => $cart,
        ]);
    }

    public function add(Request $request) {
        $productID = $request->productID;
        $quantity = $request->quantity;
        $user = Auth::user();
        $orderExist = Cart::where('userID', $user->id)->where('productID', $productID)->first();
        if ($orderExist) {
            $orderExist->quantity += $quantity;
            $orderExist->save();
        } else {
            Cart::insert([
                'userID' => $user->id,
                'productID' => $productID,
                'quantity' => $quantity,
            ]);
        }
        return redirect()->route('cart.index');
    }

    public function update(Request $request)
    {
        // Cập nhật số lượng sản phẩm trong giỏ hàng
        $cartItem = Cart::findOrFail($request->id);
        $cartItem->quantity = $request->quantity;

        $cartItem->save();

        return redirect()->route('cart.index');
    }

    public function delete($productID) {
        Cart::where('userID', Auth::id())->where('productID', $productID)->delete();
        return redirect()->route('cart.index');
    }
}
