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

    public function orderVnpay(Request $request)
    {
        $user = Auth::user();

        $order = Order::create([
            'userID' => $user->id,
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'address' => $request->address,
            'total' => 0,
            'status' => OrderStatus::ORDER,
            'paymentstatus' => 1,
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

        $action = $request->action;

        if ($action == 'home') {
            return redirect()->route('order.index')->with('success', 'Đặt hàng thành công');
        } elseif ($action === 'bank') {
            return $this->xuLyVnpay($order);
        }
    }


    public function xuLyVnpay(Order $order)
    {

        $order_code = $order->id;
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = 'http://127.0.0.1:8000/my/orders';
        $vnp_TmnCode = "F3N044AE";
        $vnp_HashSecret = "O1KQU87C8PNRD5ZUPPX5AT0ZJDM7LPQC";

        $vnp_TxnRef = $order_code;
        $vnp_OrderInfo = "Thanh toán đơn hàng #" . $order_code;
        $vnp_OrderType = "billpayment";
        $vnp_Amount = $order->total * 100;
        $vnp_Locale = "vn";
        $vnp_BankCode = "NCB";
        $vnp_IpAddr = request()->ip();

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => now()->format('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef
        );

        if ($vnp_BankCode) {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);

        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;

        $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;

        return redirect($vnp_Url);
    }
}
