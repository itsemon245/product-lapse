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
     * Update the specified resource in storage.
     */
    public function ban(Request $request, User $user)
    {
        $user = tap($user)->update([
            'banned_at' => $user->banned_at == null ? now() : null
        ]);
        if ($user->banned_at == null) {
            $message = __('User has been unbanned!');
        }{
            $message = __('User has been banned!');
        }
        notify()->success($message);
        return back();
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
