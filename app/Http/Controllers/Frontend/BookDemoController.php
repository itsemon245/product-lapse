<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\BookDemoRequest;
use App\Mail\DemoRequestMail;
use App\Models\DemoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BookDemoController extends Controller
{
    public function create()
    {
        return view('book-a-demo');
    }

    public function store(BookDemoRequest $request)
    {
        try {
            DB::beginTransaction();
            $demoRequest = DemoRequest::create($request->validated());
            Mail::to('info@eliteapps.sa')->send(new DemoRequestMail($demoRequest));
            notify()->success(__('Request submitted successfully!'));
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            notify()->error(__('Something went wrong!'));
        }

        return redirect(route('home'));
    }
}
