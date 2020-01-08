<?php
namespace GriffonTech\User\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class RedirectIfNotUser {

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
            if (Auth::guard($guard)->user()->status == 0) {
                Auth::guard($guard)->logout();

                session()->flash('warning', trans('shop::app.user.login-form.not-activated'));
                return redirect()->route('user.session.index');
            }
        }

        return $next($request);
    }
}