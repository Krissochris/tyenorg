<?php


namespace GriffonTech\User\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsVerified
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'user')
    {
        if (! Auth::guard($guard)->check()) {
            return redirect()->route('user.session.index');
        } else {
            if (Auth::guard($guard)->user()->is_verified == 0) {

                session()->flash('warning', trans('Please verify your account'));
                return redirect()->route('user.verify_account.index');
            }
        }

        return $next($request);
    }
}
