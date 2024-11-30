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
        $imagePaths = []; // Mảng để lưu đường dẫn ảnh

        // Kiểm tra nếu có ảnh được upload
        if ($request->hasFile('images')) {
            // Lặp qua các ảnh đã chọn và upload
            $imagePaths = $this->uploadFile($request->file('images'), 'product'); // Chuyển mảng ảnh vào hàm uploadFile
            dd($imagePaths); // Kiểm tra xem có mảng ảnh đúng không
        }

        // Tạo sản phẩm mới
        Product::create([
            "id_category" => $request->id_category,
            "name" => $request->name,
            "image" => json_encode($imagePaths), // Lưu mảng ảnh dưới dạng JSON
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
        if ($request->changeImage) {
            $imgPath = $this->uploadFile($request->file('image'), 'product');
            $product->image = $imgPath;
        }
        $product->price = $request->price;
        $product->size = $request->size;
        $product->quantity = $request->quantity;
        $product->describe = $request->describe;
        $product->save();

        return redirect()->route('admin.product.index');
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Xóa thành công sản phẩm');
    }
}
