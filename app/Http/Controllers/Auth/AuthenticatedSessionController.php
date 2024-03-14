<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        $request->authenticate();

        $request->session()->regenerate();

        if ($request->user()?->type == null) {
            return redirect(route('home'));
        }
        if ($request->user()?->type == 'admin') {
            return redirect(route('admin'));
        }
        if ($request->user()?->type == 'subscriber' || $request->user()?->type == 'member') {
            return redirect(route('dashboard'));
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/dashboard/product');
    }
}
