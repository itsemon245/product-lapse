<?php

namespace App\Http\Controllers\Features\Certificate;

use App\Http\Requests\CertificateRequest;
use App\Models\Certificate;
use App\Models\Invitation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::with('image')->with('user')->get();
        return view('features.certificate.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Invitation::where('owner_id', auth()->id())->where('accepted_at', 1)->get();
        // dd($teams);
        return view('features.certificate.partials.create', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificateRequest $request)
    {
        $store = Certificate::create([
            'owner_id' => auth()->id(),
            'received_id' => $request->received_id,
            'company_name' => $request->company_name,
            'description' => $request->description,
            'issue_date' => $request->issue_date,
        ]);
        $image = $store->storeImage($request->signature);
        if($image ){
            notify()->success(__('notify/success.create'));
        }
        return redirect()->route('certificate.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Certificate $certificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Certificate $certificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CertificateRequest $request, Certificate $certificate)
    {
        notify()->success(__('notify/success.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Certificate $certificate)
    {
               notify()->success(__('notify/success.delete'));
    }
}
