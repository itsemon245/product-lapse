<?php

namespace App\Http\Controllers\Features\Certificate;

use App\Models\User;
use App\Models\Invitation;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CertificateRequest;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $certificates = Certificate::with('user')->get();
        return view('features.certificate.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::find(auth()->id());
        return view('features.certificate.partials.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificateRequest $request)
    {
        $store = Certificate::create([
            'achieved_id' => $request->achieved_id,
            'name' => $request->name,
            'company' => $request->company,
        ]);
        notify()->success(__('notify/success.create'));
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
        $certificate->delete();
        notify()->success(__('notify/success.delete'));
    }
}
