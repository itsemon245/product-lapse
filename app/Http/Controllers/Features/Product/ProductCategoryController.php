<?php

namespace App\Http\Controllers\Features\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index()
    {

        $categories = ProductCategory::where('owner_id', auth()->user()->id)->get();

        return view('features.product.category.index', compact('categories'));
    }

    public function show($id)
    {
        $id = base64_decode($id);

        $category = ProductCategory::find($id);

        if ($category == null || $category->owner_id != auth()->user()->id) {
            return redirect()->back();
        }

        return view('features.product.category.show', compact('category'));
    }

    public function create()
    {
        return view('features.product.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'text_color' => 'required',
        ]);

        $category = new ProductCategory();
        $category->owner_id = auth()->user()->id;
        $category->name = $request->name;
        $category->text_color = $request->text_color;
        $category->save();

        return redirect()->route('product.category.show', $category->id);
    }

    public function edit($id)
    {
        $id = base64_decode($id);

        $category = ProductCategory::find($id);

        if ($category == null || $category->owner_id != auth()->user()->id) {
            return redirect()->back();
        }

        return view('features.product.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'text_color' => 'required',
        ]);

        $id = base64_decode($id);

        $category = ProductCategory::find($id);

        if ($category == null || $category->owner_id != auth()->user()->id) {
            return redirect()->back();
        }

        $category->name = $request->name;
        $category->text_color = $request->text_color;
        $category->save();

        return redirect()->route('product.category.show', $category->id);
    }

    public function destroy($id)
    {
        $id = base64_decode($id);

        $category = ProductCategory::find($id);

        if ($category == null || $category->owner_id != auth()->user()->id) {
            return redirect()->back();
        }

        $category->delete();

        return redirect()->route('product.index');
    }

}
