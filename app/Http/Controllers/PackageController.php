<?php

namespace App\Http\Controllers;

use App\Models\Select;
use App\Models\Package;
use App\Http\Requests\PackageRequest;
use App\Http\Requests\StorePackageRequest;

class PackageController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::get();
        return view('pages.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Select::of('package')->type('type')->get();
        return view('pages.package.partials.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PackageRequest $request)
    {
        $olddata = Package::first();
        if($olddata == !null){
            $delete = Package::destroy($olddata);
            if($delete){
                $info = ['en' => $request->info_en, 'ar' => $request->info_ar];
                $money = ['en' => $request->money_en, 'ar' => $request->money_ar];
                $featureOne = ['en' => $request->feature_one_en, 'ar' => $request->feature_one_ar];
                $featureTwo = ['en' => $request->feature_two_en, 'ar' => $request->feature_two_ar];
                $featureThree = ['en' => $request->feature_three_en, 'ar' => $request->feature_three_ar];
                Package::insert([
                    'creator_id' => auth()->id(),
                    'info' => json_encode($info),
                    'package' => $request->package,
                    'price' => $request->price,
                    'money' => json_encode($money),
                    'feature_one' => json_encode($featureOne),
                    'feature_two' => json_encode($featureTwo),
                    'feature_three' => json_encode($featureThree),
                    // 'is_popular' => $request->is_popular,
                ]);
            }
        }else{
            $info = ['en' => $request->info_en, 'ar' => $request->info_ar];
            $money = ['en' => $request->money_en, 'ar' => $request->money_ar];
            $featureOne = ['en' => $request->feature_one_en, 'ar' => $request->feature_one_ar];
            $featureTwo = ['en' => $request->feature_two_en, 'ar' => $request->feature_two_ar];
            $featureThree = ['en' => $request->feature_three_en, 'ar' => $request->feature_three_ar];
            Package::insert([
                'creator_id' => auth()->id(),
                'info' => json_encode($info),
                'package' => $request->package,
                'price' => $request->price,
                'money' => json_encode($money),
                'feature_one' => json_encode($featureOne),
                'feature_two' => json_encode($featureTwo),
                'feature_three' => json_encode($featureThree),
                // 'is_popular' => $request->is_popular,
            ]);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $package = Package::find($id);
        if (!$package) {
            return redirect()->back();
        }
        return view('pages.package.partials.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $package = Package::find($id);
        if (!$package) {
            return redirect()->back();
        }
        $type = Select::of('package')->type('type')->get();
        return view('pages.package.partials.edit', compact('package', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(PackageRequest $request, string $id)
    // {
    //     $oldData = Package::find($id);
    //     if($oldData){
    //         $info = ['en' => $request->info_en, 'ar' => $request->info_ar];
    //         $money = ['en' => $request->money_en, 'ar' => $request->money_ar];
    //         $featureOne = ['en' => $request->feature_one_en, 'ar' => $request->feature_one_ar];
    //         $featureTwo = ['en' => $request->feature_two_en, 'ar' => $request->feature_two_ar];
    //         $featureThree = ['en' => $request->feature_three_en, 'ar' => $request->feature_three_ar];
    //         Package::update([
    //             'creator_id' => auth()->id(),
    //             'info' => json_encode($info),
    //             'package' => $request->package,
    //             'price' => $request->price,
    //             'money' => json_encode($money),
    //             'feature_one' => json_encode($featureOne),
    //             'feature_two' => json_encode($featureTwo),
    //             'feature_three' => json_encode($featureThree),
    //             // 'is_popular' => $request->is_popular,
    //         ]);
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Package::destroy($id);
        return back()->with(['success', 'Delete Success!']);
    }

    public function createInput()
    {
        return view('pages.package.partials.input');
    }
}
