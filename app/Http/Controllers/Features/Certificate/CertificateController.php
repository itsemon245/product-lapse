<?php

namespace App\Http\Controllers\Features\Certificate;

use App\Http\Requests\CertificateRequest;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('features.certificate.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('features.certificate.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CertificateRequest $request)
    {
        notify()->success(__('notify/success.create'));
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
