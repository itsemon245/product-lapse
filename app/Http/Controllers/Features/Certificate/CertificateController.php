<?php

namespace App\Http\Controllers\Features\Certificate;

use App\Models\User;
use App\Models\Select;
use App\Models\Invitation;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Services\SearchService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\CertificateRequest;

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
        $user = User::find(auth()->id());
        $certificate = Certificate::where('achieved_id', auth()->id())->first();
        return view('features.certificate.partials.create', compact('user', 'certificate'));
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
            'status' => null,
            'link' => 'shareable link here',
        ]);
        notify()->success(__('notify/success.create'));
        return redirect()->route('certificate.create');
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
        return back();
    }


    public function getCertificate()
    {
        $certificates = Certificate::with('user')->get();
        return view('features.certificate.index', compact('certificates'));

    }
    public function certificateStatus()
    {
        return $this->create();
    }


    //super admin method
    public function getAllCertificate(){
        $certificates = Certificate::with('user')->latest()->paginate();
        $statuses  = Select::of('certificate')->type('status')->get();
        // dd($statuses);
        return view('pages.certificate.index', compact('certificates', 'statuses'));
    }

    public function approval(string $id)
    {
        $certificate = Certificate::find($id);
        $certificate->update([
            'approved_id' => auth()->id(),
            'status' => 1,
            'issue_date' => now(),
        ]);
        notify()->success(__('notify/success.update'));
        return back();
    }

    public function cancel(string $id)
    {
        $certificate = Certificate::find($id);
        $certificate->update([
            'status' => 2,
        ]);
        notify()->success(__('notify/success.update'));
        return back();
    }

    public function search(CertificateRequest $request)
    {
        $certificates = Certificate::with('user')->where('status', $request->status)->latest()->paginate();
        // $certificates = SearchService::items($request->status);
        $statuses  = Select::of('certificate')->type('status')->get();
        return view('pages.certificate.index', compact('certificates', 'statuses'));
    }

}
