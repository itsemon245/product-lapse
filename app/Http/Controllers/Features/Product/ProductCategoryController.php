<?php

namespace App\Http\Controllers\Features\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Select;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = Select::of("product")->type("category")->get();
        return view('features.product.category.index', compact('categories'));
    }

    public function show($id)
    {

        $category = Select::find($id);
        if ($category == null) {
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
        try {
            $request->validate(ProductCategory::rules());
            $value = [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ];
            $select = Select::create([
                'owner_id' => auth()->id(),
                'model_type' => 'product',
                'type' => 'category',
                'color' => $request->text_color,
                'value' => $value
            ]);
            notify()->success(__('notify/success.create'));
            return redirect()->route('product-category.show', $select->id);
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            notify()->error(__('notify/error.create'));
            return redirect()->back();
        }
    }


    public function edit($id)
    {
        $category = Select::find($id);

        if ($category == null) {
            return redirect()->back();
        }
        return view('features.product.category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate(ProductCategory::rules());
            $value = [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ];

            $category = Select::findOrFail($id);

            $category->color = $request->text_color;
            $category->value = $value;
            $category->save();

            notify()->success(__('notify/success.update'));

        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            notify()->error(__('notify/error.update'));
        }
        return redirect()->route('product-category.index');
    }

    public function destroy($id)
    {

        try {
            $category = Select::find($id);
            if ($category == null) {
                notify()->error(__('notify/error.delete'));
                return redirect()->back();
            }
            $category->delete();
            notify()->error(__('notify/success.create'));
        } catch (\Exception $e) {
            \Log::error($e->getMessage());
            notify()->error(__('notify/error.delete'));
        }


        return redirect()->route('product-category.index');
    }

}
