<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Select;
use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;

class UsersManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribers = User::where('type', 'subscriber')->paginate(10);
        return view('pages.users.management', compact('subscribers'));
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, User $user)
    {
        dd($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(SearchRequest $request)
    {
        $subscribers = SearchService::items($request);
        return view('pages.users.management', compact('subscribers'));
    }
}
