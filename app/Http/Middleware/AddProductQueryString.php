<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddProductQueryString
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // $productId = $request->route('product') ?? $request->query('product_id');
        // if ($productId != null) {
        //     $request->query->add(['product_id' => $productId]);
        // }
        return $next($request);
    }
}
