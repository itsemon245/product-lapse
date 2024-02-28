<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if ($user == null) {
            return redirect(route('login'));
        }
        if ($user->type == null) {
            // notify()->warning(__('You are not allowed to visit this part!'));
            return redirect()->route('home');
        }

        if ($user->type != 'admin') {
            return redirect()->route('dashboard');
        }
        return $next($request);
    }
}
