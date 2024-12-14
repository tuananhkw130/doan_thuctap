<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::select('products.*', 'categories.name as category_name')
            ->join('categories', 'products.id_category', 'categories.id')
            ->get();
        return view(
            'admin.product.index',
            ["listProduct" => $products]
        );
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.product.create', [
            "listCategory" => $categories
        ]);
    }

    public function store(Request $request)
    {
        $imagePaths = [];

        if ($request->hasFile('images')) {
            $imagePaths = $this->uploadFile($request->file('images'), 'product');
        }

        Product::create([
            "id_category" => $request->id_category,
            "name" => $request->name,
            "image" => json_encode($imagePaths),
            "price" => $request->price,
            "size" => $request->size,
            "quantity" => $request->quantity,
            "describe" => $request->describe,
        ]);

        return redirect()->route('admin.product.index');
    }


    public function edit($id)
    {
        $categories = Category::get();
        $product = Product::findOrFail($id);
        return view("admin.product.edit", [
            "itemProduct" => $product,
            "listCategory" => $categories,
        ]);
    }

    public function update(Request $request)
    {

        $product = Product::findOrFail($request->id);

        $product->name = $request->name;
        $product->price = $request->price;
        $product->size = $request->size;
        $product->quantity = $request->quantity;
        $product->describe = $request->describe;

        $currentImages = is_array($product->image) ? $product->image : json_decode($product->image, true) ?? [];

        if ($request->has('deleteImages')) {
            foreach ($request->deleteImages as $index) {
                if (isset($currentImages[$index])) {
                    $imagePath = public_path($currentImages[$index]);
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                    unset($currentImages[$index]);
                }
            }
        }

        if ($request->hasFile('newImages')) {
            foreach ($request->file('newImages') as $file) {
                $newImagePath = $this->uploadFile($file, 'product');
                $currentImages[] = $newImagePath;
            }
        }
        $product->image = json_encode(array_values($currentImages));

        $product->save();
        return redirect()->route('admin.product.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }


    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Xóa thành công sản phẩm');
    }
}
