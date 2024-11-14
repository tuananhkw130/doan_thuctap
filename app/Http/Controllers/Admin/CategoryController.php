<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        return view(
            'admin.category.index',
            ["listCategories" => $categories]
        );
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        Category::create([
            "name" => $request->name,
            "describe" => $request->describe
        ]);
        return redirect()->route('admin.category.index');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.edit', [
            "itemCategory" => $category
        ]);
    }

    public function update(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->name = $request->name;
        $category->describe = $request->describe;

        $category->save();

        return redirect()->route('admin.category.index');
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'Xóa thành công danh mục');
    }
}
