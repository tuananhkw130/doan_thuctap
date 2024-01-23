<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    public function index()
    {
        // Lấy thông tin giỏ hàng từ database và trả về view
        $cartItems = Cart::all();
        return view('cart.index', compact('cartItems'));
    }

    public function add(Request $request)
    {

        // Thêm sản phẩm vào giỏ hàng
        Cart::create([
            'userID' => auth()->id(),
            'productID' => $request->productID,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('cart.index');
    }

    public function update(Request $request)
    {
        // Cập nhật số lượng sản phẩm trong giỏ hàng
        $cartItem = Cart::find($request->cart_id);
        $cartItem->update([
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('cart.index');
    }

    public function remove(Request $request)
    {
        // Xóa sản phẩm khỏi giỏ hàng
        Cart::destroy($request->cart_id);

        return redirect()->route('cart.index');
    }
}
