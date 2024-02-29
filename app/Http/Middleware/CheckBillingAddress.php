<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckBillingAddress
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user()) {
            $user = User::find(auth()->id());
            if ($user->billingAddress() == null) {
                session()->put('package-url', url()->current());
                notify()->warning(__('Please update your billing address first!'));
                return redirect(route('address.edit'));
            }
        }
        return $next($request);
    }
}
