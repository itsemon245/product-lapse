<?php

namespace App\Http\Controllers\Features\Certificate;

use App\Models\User;
use App\Models\Select;
use App\Models\Invitation;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Services\SearchService;
use Illuminate\Support\Facades\DB;
use App\Enums\CertificateStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\CertificateRequest;
use Illuminate\Database\Eloquent\Builder;

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
            'status' => 'pending',
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
    public function delete(string $id)
    {
        $certificate = Certificate::find($id);
        $certificate->delete();
        notify()->success(__('notify/success.delete'));
        return back();
    }

    //clint side method
    public function getCertificate()
    {
        $certificates = Certificate::with('user')->get();
        return view('features.certificate.index', compact('certificates'));

    }

        //clint side method
    public function certificateStatus()
    {
        return $this->create();
    }


    //super admin method
    public function getAllCertificate(){
        $certificates = Certificate::with('user')->latest()->paginate();
        $statuses  = CertificateStatusEnum::cases();
        // dd($statuses);
        return view('pages.certificate.index', compact('certificates', 'statuses'));
    }
    //super admin method
    public function approval(string $id)
    {
        $certificate = Certificate::find($id);
        $certificate->update([
            'approved_id' => auth()->id(),
            'status' => 'approved',
            'issue_date' => now(),
        ]);
        notify()->success(__('notify/success.update'));
        return back();
    }
    //super admin method
    public function cancel(string $id)
    {
        $certificate = Certificate::find($id);
        $certificate->update([
            'status' => 'rejected',
        ]);
        notify()->success(__('notify/success.update'));
        return back();
    }
    public function filter(Request $request)
    {
        if($request->search == 'all'){
            $certificates = Certificate::latest()->paginate();
            $statuses  = Select::of('certificate')->type('status')->get();
            return view('pages.certificate.index', compact('certificates', 'statuses'));
        }
        $certificates = Certificate::where('status', 'like', '%' . $request->search . '%')->latest()->paginate();
        $statuses  = CertificateStatusEnum::cases();
        return view('pages.certificate.index', compact('certificates', 'statuses'));
    }
    



    //super admin method
    public function search(Request $request)
    {   
        if($request->search ==  null){
            $certificates = Certificate::latest()->paginate();
            $statuses  = CertificateStatusEnum::cases();
            return view('pages.certificate.index', compact('certificates', 'statuses'));  
        }else{
            $certificates = Certificate::where('company', 'like', '%' . $request->search . '%')->latest()->paginate();
            $statuses  = CertificateStatusEnum::cases();
            return view('pages.certificate.index', compact('certificates', 'statuses'));
        }

    }

}
