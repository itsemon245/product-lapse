<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class EnsureDatabaseConnection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Redirect to install route to add database credentials if not set
        try {
            DB::getPdo();
        } catch (\Throwable $th) {
            if (! $request->routeIs('app.install.*')) {
                return redirect(route('app.install.index'));
            }
        }

        return $next($request);
    }
}
