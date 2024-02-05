<?php

namespace App\Http\Controllers;

use App\Models\Moniz;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;

class EditableController extends Controller
{
    public function update(Request $request)
    {
        $model = Str::studly($request->model);
        $model = $model::first();
        $model = tap($model)->update([
            $request->key => $request->value,
        ]);
        notify()->success(__('notify/success.update'));
        return $model;
    }
    public function uploadImage(Request $request)
    {
        $path = saveFile($request->filepond, 'moniz', '', 'temp');
        return storage_path('app/temp/') . $path;
    }
    public function submitImage(Request $request)
    {
        $model = Str::studly($request->model);
        $data = $model::first();
        $keys = explode('->', $request->key);
        $oldPath = $data;
        foreach ($keys as $key) {
            $oldPath = $oldPath?->{$key} ?? null;
        }
        $array = explode('/', $request->filepond);
        $name = array_pop($array);
        $array = explode('/', $request->model);
        $folder = array_pop($array);
        $newPath = public_path("frontend/{$folder}/uploads/{$name}");
        File::move($request->filepond, $newPath);

        if (!Str::contains($oldPath, 'moniz/assets/images')) {
            File::delete(public_path($oldPath));
        }

        $data->update([
            $request->key => "frontend/{$folder}/uploads/{$name}"
        ]);
        $request->session()->flash('success', 'Content Updated!');
        return back();
    }
}
