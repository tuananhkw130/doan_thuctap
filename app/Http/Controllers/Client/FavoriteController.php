<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class FavoriteController extends Controller
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

        $favorites = Favorite::select('products.*')
            ->join('products', 'products.id', '=', 'favorites.productID')
            ->where('favorites.userID', Auth::id())
            ->get();

        return view('client.favorites.index', [
            'favoriteItems' => $favorites,
        ], compact('season'));
    }

    // Thêm sản phẩm vào danh sách yêu thích
    public function add(Request $request)
    {
        // Kiểm tra người dùng đã đăng nhập chưa
        if (!Auth::check()) {
            return redirect()->route('auth.showLogin')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào danh sách yêu thích.');
        }

        $productID = $request->productID;
        $user = Auth::user();

        // Kiểm tra sản phẩm có tồn tại trong cơ sở dữ liệu không
        $product = Product::find($productID);
        if (!$product) {
            return redirect()->route('favorite.index')->with('error', 'Sản phẩm không tồn tại.');
        }

        // Kiểm tra sản phẩm đã tồn tại trong danh sách yêu thích chưa
        $favoriteExist = Favorite::where('userID', $user->id)->where('productID', $productID)->first();
        if ($favoriteExist) {
            return redirect()->route('favorite.index')->with('error', 'Sản phẩm đã có trong danh sách yêu thích.');
        }

        // Thêm sản phẩm vào danh sách yêu thích
        Favorite::create([
            'userID' => $user->id,
            'productID' => $productID,
        ]);

        return redirect()->route('favorite.index')->with('success', 'Đã thêm sản phẩm vào danh sách yêu thích.');
    }

    // Xóa sản phẩm khỏi danh sách yêu thích
    public function delete($productID)
    {
        Favorite::where('userID', Auth::id())->where('productID', $productID)->delete();
        return redirect()->route('favorite.index')->with('success', 'Đã xóa sản phẩm khỏi danh sách yêu thích.');
    }
}
