<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\LandingPageRequest;
use App\Models\LandingPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $getData = LandingPage::find(1);
    //    dd(json_decode($getData->home['title']));
       foreach (json_decode($getData) as $value) {
        echo $value->title;
        // dd($value);
       }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LandingPageRequest $request)
    {
        // $data = $request->all();
        // $title = ['title' => $request->input('title')];
        // $subTitle = ['subTitle' => $request->input('subTitle')];
        // $merge = $title + $subTitle;
        // if($title ==  true){
        //     $model = new LandingPage();
        //     $model->home = json_encode($merge);
        //     $model->save();   

        // }
       
        // var_dump($name);
        // LandingPage::create([
        //     'home' => [
        //         'title' => $title,
        //         'subTitle' => $subTitle,
        //     ],
        //     'about_us' => [
        //         'title' => $title,
        //         'subTitle' => $subTitle,
        //     ],
        //     'contact_us' => [
        //         'title' => $title,
        //         'subTitle' => $subTitle,
        //     ],
        // ]);
      
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LandingPageRequest $request, string $id)
    {

        




        // $find = LandingPage::find($id);
        // // if($find){
        // // //    dd($find->home);
        // // }
        // // $title = ['title' => $request->query('key')];
        // // $subTitle = ['subTitle' => $request->input('subTitle')];
        // // $merge = $title + $subTitle;
        // if($title ==  true){
        //     $model = new LandingPage();
        //     $model->home = json_encode($merge);
        //     $model->save();   

        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
