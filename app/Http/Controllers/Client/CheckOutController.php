<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Enums\OrderStatus;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $cart = Cart::select('carts.*', 'products.price', 'products.name')->join('products', 'products.id', 'carts.productID')
            ->where('userID', $user->id)->get();
        return view('client.checkout.index', [
            'cart' => $cart,
        ]);
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

            $product = Product::findOrFail($cart->productID);

            if ($product->quantity < $cart->quantity) {
                return redirect()->back()->with('error', 'Không đủ hàng trong kho');
            }

            // Trừ số lượng kho
            $product->quantity -= $cart->quantity;
            $product->save();

            array_push($dataOrderAdd, [
                'orderID' => $order->id,
                'productID' => $cart->productID,
                'quantity' => $cart->quantity,
                'price' => $cart->price,
            ]);
            $total += $cart->price * $cart->quantity;
        }
        OrderDetail::insert($dataOrderAdd);

        $order->total = $total;
        $order->save();

        Cart::where('userID', $user->id)->delete();

        return redirect()->route('order.index')->with('success', 'Đặt hàng thành công');
    }


    public function createPayment(Request $request)
    {
        $vnp_TmnCode = config('vnpay.vnp_TmnCode');
        $vnp_HashSecret = config('vnpay.vnp_HashSecret');
        $vnp_Url = config('vnpay.vnp_Url');
        $vnp_Returnurl = config('vnpay.vnp_Returnurl');
        $vnp_TxnRef = date("YmdHis"); // Mã đơn hàng
        $vnp_OrderInfo = "Thanh toán đơn hàng";
        $vnp_OrderType = 'billpayment';
        $vnp_Amount = $request->input('amount') * 100; // Số tiền thanh toán
        $vnp_Locale = 'vn';
        $vnp_IpAddr = $request->ip();

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        ];

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }

        return redirect($vnp_Url);
    }


}
