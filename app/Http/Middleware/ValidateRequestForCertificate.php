<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateRequestForCertificate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $package = $request->user()->activePlan()->first()->order->package;
        $isNotMoreThanYear = $package->validity >= 1 && $package->unit == 'year';
        if ($isNotMoreThanYear) {
            notify()->warning(__('Please read the conditions for obtaining the certificate to learn more'),__('You need at least a one-year package to obtain certificate!'));
            return back();
        }
        return $next($request);
    }
}
