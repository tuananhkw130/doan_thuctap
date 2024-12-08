<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $currentMonth = Carbon::now()->month;
        if (in_array($currentMonth, [11, 12, 1])) {
            $season = 'winter';
        } elseif (in_array($currentMonth, [8, 9, 10])) {
            $season = 'autumn';
        } else {
            $season = 'other';
        }
        $query = [
            'idcategory' => $request->input('idcategory'),
            'price' => $request->input('price'),
            'search' => $request->input('search'),
        ];

        $product = Product::query();

        if ($query['idcategory']) {
            $product = $product->where('id_category', $query['idcategory']);
        }

        if ($query['price']) {
            switch ($query['price']) {
                case 1:
                    $product = $product->where('price', '<', 100000);
                    break;
                case 2:
                    $product = $product->where('price', '>=', 100000)->where('price', '<=', 200000);
                    break;
                case 3:
                    $product = $product->where('price', '>=', 200000)->where('price', '<=', 300000);
                    break;
                case 4:
                    $product = $product->where('price', '>=', 300000)->where('price', '<=', 500000);
                    break;
                case 5:
                    $product = $product->where('price', '>=', 500000);
                    break;
            }
        }

        if ($query['search']) {
            $product = $product->where('name', 'like', '%' . $query['search'] . '%');
        }

        // Lấy dữ liệu sau khi lọc
        $product = $product->get();  // Chuyển từ query sang get() để lấy dữ liệu

        return view('client.product.index', [
            'products' => $product,
        ], compact('season'));

    }

    public function detail($id)
    {
        $currentMonth = Carbon::now()->month;
        if (in_array($currentMonth, [11, 12, 1])) {
            $season = 'winter';
        } elseif (in_array($currentMonth, [8, 9, 10])) {
            $season = 'autumn';
        } else {
            $season = 'other';
        }
        $product = Product::findOrFail($id);

        return view('client.product.detail', [
            'product' => $product,

        ], compact('season'));
    }
}
