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
        ];

        $product = Product::get();

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
