<?php

namespace App\Http\Controllers\Features\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductStage;
use Illuminate\Http\Request;

class ProductStageController extends Controller
{

    public function index()
    {
        $stages = ProductStage::where('owner_id', auth()->user()->id)->get();

        if ($stages->count() == 0) {
            return redirect()->route('product.stage.create');
        }

        return view('features.product.stage.index', compact('stages'));
    }
    public function show($id)
    {
        $id = base64_decode($id);

        $product = ProductStage::find($id);

        if ($product == null || $product->owner_id != auth()->user()->id) {
            return redirect()->back();
        }
        return view('features.product.stage.show', compact('product'));
    }

    public function create()
    {
        return view('features.product.stage.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'text_color' => 'required',
        ]);

        $stage = new ProductStage();
        $stage->owner_id = auth()->user()->id;
        $stage->name = $request->name;
        $stage->text_color = $request->text_color;
        $stage->save();

        return redirect()->route('product.stage.show', $request->product_id);
    }

    public function edit($id)
    {
        $id = base64_decode($id);

        $stage = ProductStage::find($id);

        if ($stage == null || $stage->owner_id != auth()->user()->id) {
            return redirect()->back();
        }

        return view('features.product.stage.edit', compact('stage'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'text_color' => 'required',
        ]);

        $id = base64_decode($id);

        $stage = ProductStage::find($id);

        if ($stage == null || $stage->owner_id != auth()->user()->id) {
            return redirect()->back();
        }

        $stage->name = $request->name;
        $stage->text_color = $request->text_color;
        $stage->save();


        return redirect()->route('product.stage.show', $request->product_id);
    }

    public function destroy($id)
    {
        $id = base64_decode($id);

        $stage = ProductStage::find($id);

        if ($stage == null || $stage->owner_id != auth()->user()->id) {
            return redirect()->back();
        }

        $stage->delete();

        return redirect()->back();
    }
}
