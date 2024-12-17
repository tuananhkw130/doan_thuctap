<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{
    public function index()
    {


        $cart = Cart::select('products.*', 'carts.quantity')
            ->join('products', 'products.id', 'carts.productID')
            ->where('carts.userID', Auth::id())
            ->get();

        return view('client.cart.index', [
            'cartItems' => $cart,
        ]);
    }

    public function add(Request $request)
    {

        if (!Auth::check()) {
            return redirect()->route('auth.showLogin')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }

        $productID = $request->productID;
        $quantity = $request->quantity;
        $user = Auth::user();


        $product = Product::find($productID);
        if (!$product) {
            return redirect()->route('cart.index')->with('error', 'Sản phẩm không tồn tại.');
        }

        if ($quantity > $product->quantity) {
            return redirect()->route('product.detail', ['id' => $productID])->with('error', 'Số lượng sản phẩm bạn đặt vượt quá số lượng hiện có.');
        }

        $orderExist = Cart::where('userID', $user->id)->where('productID', $productID)->first();
        if ($orderExist) {
            if ($orderExist->quantity + $quantity > $product->quantity) {
                return redirect()->route('cart.index')->with('error', 'Tổng số lượng trong giỏ hàng vượt quá số lượng sản phẩm hiện có.');
            }
            $orderExist->quantity += $quantity;
            $orderExist->save();
        } else {
            Cart::insert([
                'userID' => $user->id,
                'productID' => $productID,
                'quantity' => $quantity,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Thêm thành công vào giỏ hàng.');
    }


    public function delete($productID)
    {
        Cart::where('userID', Auth::id())->where('productID', $productID)->delete();
        return redirect()->route('cart.index');
    }
}
