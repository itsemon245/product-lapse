<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DemoRequest;

class DemoRequestController extends Controller
{
    public function index()
    {
        $demoRequests = DemoRequest::latest()->paginate();
        return view('pages.demo-request.index', compact('demoRequests'));
    }
}
