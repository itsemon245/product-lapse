<?php

namespace App\Http\Controllers\Features\Team;


use App\Models\User;
use App\Models\Select;
use App\Models\Product;
use App\Models\Invitation;
use App\Models\ProductUser;
use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Models\InvitationProduct;
use Spatie\Permission\Models\Role;
use App\Services\InvitationService;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\TeamInvitationRequest;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Product::find(productId())->users()->with('roles')->paginate(10);
        return view('features.team.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::with('image')->get();
        $roles = Role::where('name', '!=', 'admin')
        ->where('name', '!=', 'account holder')
        ->get();
        $tasks = Product::find(productId())->tasks;
        // dd($tasks); 
        return view('features.team.partials.create', compact('products', 'roles', 'tasks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamInvitationRequest $request)
    {
        $teamStore = InvitationService::store($request);
        if ($teamStore) {
            notify()->success(__('notify/success.create'));
            return redirect()->route('team.index');
        }

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $team)
    {
        $team->deleteImage();
        $delete = $team->delete();
        if ($delete) {
            notify()->success(__('notify/success.delete'));
            return redirect()->route('team.index');
        }


    }

    public function search(SearchRequest $request)
    {
        $teams = SearchService::items($request);
        return view('features.team.index', compact('teams'));
    }
}
