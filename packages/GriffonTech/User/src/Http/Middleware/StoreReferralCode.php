<?php

namespace GriffonTech\User\Http\Middleware;

use Closure;

class StoreReferralCode
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        if ($request->has('ref')){
            $response->cookie('ref', $request->get('ref'), 24 * 60 * 7);
        }
        return $response;
    }
}
