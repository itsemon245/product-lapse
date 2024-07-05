<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class EnsureIsNotInstalled
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $installed = env('APP_INSTALLED');
        try {
            DB::getPdo();
            $installed = true;
        } catch (\Throwable $th) {
            $installed = false;
        }
        if ($installed) {
            setEnv([
                'APP_INSTALLED'=> "true"
                ]);
            notify()->success('Application is installed!');

            return redirect('/');
        }

        return $next($request);
    }
}
