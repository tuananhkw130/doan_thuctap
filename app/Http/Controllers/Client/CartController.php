<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CartController extends Controller
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

        $cart = Cart::select('products.*', 'carts.quantity')
            ->join('products', 'products.id', 'carts.productID')
            ->where('carts.userID', Auth::id())
            ->get();

        return view('client.cart.index', [
            'cartItems' => $cart,
        ], compact('season'));
    }

    public function add(Request $request)
    {
        // Kiểm tra người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect()->route('auth.showLogin')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào giỏ hàng.');
        }

        $productID = $request->productID;
        $quantity = $request->quantity;
        $user = Auth::user();

        // Lấy sản phẩm từ cơ sở dữ liệu
        $product = Product::find($productID);
        if (!$product) {
            return redirect()->route('cart.index')->with('error', 'Sản phẩm không tồn tại.');
        }

        // Kiểm tra số lượng đặt hàng có lớn hơn số lượng sản phẩm hiện có hay không
        if ($quantity > $product->quantity) {
            return redirect()->route('product.detail', ['id' => $productID])->with('error', 'Số lượng sản phẩm bạn đặt vượt quá số lượng hiện có.');
        }

        // Kiểm tra sản phẩm đã tồn tại trong giỏ hàng chưa
        $orderExist = Cart::where('userID', $user->id)->where('productID', $productID)->first();
        if ($orderExist) {
            // Kiểm tra tổng số lượng sau khi cập nhật
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
