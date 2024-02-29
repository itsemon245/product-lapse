<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'title'=>  'required|string|max:255|value,title',
    //         'body' => 'required|string'
    //     ]);
    //     $page = Page::create([
    //         'title'=> $request->title,
    //         'body'=> $request->body,
    //         'slug'=> str($request->slug)->slug(),
    //     ]);
    //     notify()->success(__('notify/success.create'));

    //     return back();
    // }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('admin.page.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $request->validate([
            'title'=>  'required|array',
            'body' => 'required|array'
        ]);
        $page = tap($page)->update([
            'title'=> $request->title,
            'body'=> $request->body,
            'slug'=> str($request->title['en'])->slug(),
        ]);
        notify()->success(__('notify/success.update'));

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        notify()->success(__('notify/success.delete'));
        return back();
    }
}
