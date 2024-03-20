<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckProductLimit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->user() == null) {
            return redirect(route('login'));    
        }
        if (auth()->user()->type = 'subscriber') {
            $ownerId = auth()->id();
        }else{
            $ownerId = auth()->user()->owner_id;
        }
        $user = User::find($ownerId);
        $activePlan = $user->activePlan()->first();
        if ($activePlan) {
            $limitExceeded = $user->products->count() >= $activePlan->product_limit;
            if ($limitExceeded) {
                notify()->error(__('Please <a href="/upgrade-package" class="underline text-blue-500">UPGRADE</a> your plan to add more product'), __('Limit Exceeded!'));
                return redirect(route('product.index'));
            }
        }
        return $next($request);
    }
}
