<?php

namespace App\Http\Controllers\Features;

use App\Enums\Colors;
use App\Enums\Feature;
use App\Enums\SelectType;
use App\Http\Controllers\Controller;
use App\Http\Requests\SelectRequest;
use App\Models\Select;
use Illuminate\Support\Facades\Log;

class SelectController extends Controller
{
    public function index()
    {
        $selects = Select::get();
        return view('features.select.index', compact('selects'));
    }

    public function create()
    {
        $features = Feature::cases();
        $types = SelectType::cases();
        $colors = Colors::cases();
        return view('features.select.create', compact('features', 'types', 'colors'));
    }

    public function store(SelectRequest $request)
    {
        try {
            $value = [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ];
            $select = Select::create([
                'owner_id' => auth()->id(),
                'model_type' => $request->model_type,
                'type' => $request->type,
                'color' => $request->text_color,
                'value' => $value,
            ]);
            notify()->success(__('notify/success.create'));
            return redirect()->route('select.index');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            notify()->error(__('notify/error.create'));
            return redirect()->back();
        }
    }

    public function edit(Select $select)
    {
        $features = Feature::cases();
        $types = SelectType::cases();
        $colors = Colors::cases();
        return view('features.select.edit', compact('select', 'features', 'types', 'colors'));
    }

    public function update(SelectRequest $request, Select $select)
    {
        try {
            $value = [
                'en' => $request->name_en,
                'ar' => $request->name_ar,
            ];
            $select->update([
                'model_type' => $request->model_type,
                'type' => $request->type,
                'color' => $request->text_color,
                'value' => $value,
            ]);

            notify()->success(__('notify/success.update'));

        } catch (\Exception $e) {
            Log::error($e->getMessage());
            notify()->error(__('notify/error.update'));
        }
        return redirect()->route('select.index');
    }

    public function destroy(Select $select)
    {
        try {
            if ($select == null) {
                notify()->error(__('notify/error.delete'));
                return redirect()->back();
            }
            $select->delete();
            notify()->error(__('notify/success.create'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            notify()->error(__('notify/error.delete'));
        }

        return redirect()->route('select.index');
    }
}
