<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscriber
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
            if (url()->previous() == route('login')) {
                return redirect('/');
            }
            // notify()->warning(__('You are not allowed to visit this part yet!'));
            return redirect()->route('package.upgrade');
        }
        if ($user->type == 'admin') {
            return redirect()->route('admin');
        }
        if ($user->activePlan()->first() == null && $user->type != 'member') {
            notify()->warning(__('Your plan has been expired!'));
            return redirect()->route('package.upgrade');
        }
        return $next($request);
    }
}
