<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::get();
        return view('client.product.index', [
            'products' => $product,
        ]);
    }

    public function detail ($id) {
        $product = Product::findOrFail($id);
        return view('client.product.detail', [
            'product' => $product,
        ]);
    }
}
