<?php

namespace App\Http\Middleware;

use App\Enums\Feature;
use App\Models\Product;
use Closure;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
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
        if ($request->user()->type != 'subscriber') {
            notify()->warning(__('You are not authorized!'), __('Restricted Area'));
            return back();
        }
        $activePlan = $request->user()->activePlan()->first();
        if ($activePlan) {
            $package         = $request->user()->activePlan()->first()->order?->package;
            $isMoreThanAYear = $package->validity >= 1 && $package?->unit == 'year';
            if (!$isMoreThanAYear) {
                return redirect(route('certificate.index'))->with('certificate', [
                    'title' => __('You need to purchase at least a one-year package to obtain the certificate!'),
                    'hint'  => __('Please read the conditions for obtaining the certificate to learn more'),
                 ]);
            }
        }
        $products = Product::ofOwner()->where(function (Builder $q) {
            $features = array_column(Feature::cases(), 'value');

            // Remove product and certificate from feature list
            $features = collect($features)->except(array_search('product', $features))->toArray();
            $features = collect($features)->except(array_search('certificate', $features));
            foreach ($features as $feature) {
                $relation = Str::plural($feature);
                $q->has($relation);
            }
        })->count();
        if ($products < 1) {
            return redirect(route('certificate.index'))->with('certificate', [
                'title' => __('You need to add data for at least one product with all other data to obtain the certificate!'),
                'hint'  => __('Please read the conditions for obtaining the certificate to learn more'),
             ]);
        }

        return $next($request);
    }
}
