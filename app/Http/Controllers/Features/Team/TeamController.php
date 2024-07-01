<?php

namespace App\Http\Controllers\Features\Team;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamInvitationRequest;
use App\Models\Product;
use App\Models\User;
use App\Services\InvitationService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Product::find(productId())->users()
            ->where(function (Builder $q) {
                if (request()->has('search')) {
                    $columns = request()->columns;
                    $search = request()->search;
                    foreach ($columns as $column) {
                        $q->orWhere($column, 'like', '%'.$search.'%');
                    }
                }
            })
            ->with('roles', 'mainAccount')->latest()->paginate(10);

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
        $team = null;

        return view('features.team.partials.create', compact('products', 'roles', 'tasks', 'team'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function edit(string $id)
    {
        $products = Product::with('image')->get();
        $roles = Role::where('name', '!=', 'admin')
            ->where('name', '!=', 'account holder')
            ->get();
        $tasks = Product::find(productId())->tasks;
        $team = Product::find(productId())->users()->find($id);

        return view('features.team.partials.create', compact('products', 'roles', 'tasks', 'team'));
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
     * Store a newly created resource in storage.
     */
    public function update(Request $request, User $team)
    {
        $user = $team;
        $user->roles()->detach();
        $user->assignRole($request->role);
        foreach ($request->tasks as $task) {
            $user->tasks()->attach($task);
        }
        // $user->myProducts()->detach();
        $user->myProducts()->sync($request->products);
        // foreach ($request->products as $product) {
        //     $user->myProducts()->attach($product);
        //     // Product::find($product)->user()->attach($user->id);
        // }
        notify()->success(__('notify/success.update'));

        return redirect()->route('team.index');

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
}
