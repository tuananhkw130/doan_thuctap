<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {

        $favorites = Favorite::select('products.*')
            ->join('products', 'products.id', '=', 'favorites.productID')
            ->where('favorites.userID', Auth::id())
            ->get();

        return view('client.favorites.index', [
            'favoriteItems' => $favorites,
        ]);
    }

    public function add(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('auth.showLogin')->with('error', 'Bạn cần đăng nhập để thêm sản phẩm vào danh sách yêu thích.');
        }

        $productID = $request->productID;
        $user = Auth::user();

        $product = Product::find($productID);
        if (!$product) {
            return redirect()->route('favorite.index')->with('error', 'Sản phẩm không tồn tại.');
        }

        $favoriteExist = Favorite::where('userID', $user->id)->where('productID', $productID)->first();
        if ($favoriteExist) {
            return redirect()->route('favorite.index')->with('error', 'Sản phẩm đã có trong danh sách yêu thích.');
        }

        Favorite::create([
            'userID' => $user->id,
            'productID' => $productID,
        ]);

        return redirect()->route('favorite.index')->with('success', 'Đã thêm sản phẩm vào danh sách yêu thích.');
    }

    public function delete($productID)
    {
        Favorite::where('userID', Auth::id())->where('productID', $productID)->delete();
        return redirect()->route('favorite.index')->with('success', 'Đã xóa sản phẩm khỏi danh sách yêu thích.');
    }
}
