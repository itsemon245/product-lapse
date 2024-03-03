<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
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
        $isMoreThanAYear = $package->validity >= 1 && $package->unit == 'year';
        if (!$isMoreThanAYear) {
            return redirect(route('certificate.index'))->with('certificate', [
                'title'=> __('You need to purchase at least a one-year package to obtain the certificate!'),
                'hint' => __('Please read the conditions for obtaining the certificate to learn more')
            ]);
        }
        $products = Product::ofOwner()->where(function(Builder $q){
            $q->has('ideas');
        })->count();
        if ($products < 1) {
            return redirect(route('certificate.index'))->with('certificate', [
                'title'=> __('You need to add data for at least one product with all other data to obtain the certificate!'),
                'hint' => __('Please read the conditions for obtaining the certificate to learn more')
            ]);
        }

        return $next($request);
    }
}
