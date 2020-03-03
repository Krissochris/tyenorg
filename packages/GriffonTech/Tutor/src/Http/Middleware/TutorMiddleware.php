<?php


namespace GriffonTech\Tutor\Http\Middleware;

use Closure;
use GriffonTech\Tutor\Repositories\TutorProfileRepository;
use Illuminate\Support\Facades\Auth;

class TutorMiddleware
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
            return redirect()->route('user.session.create');
        }

        /*if (\auth('user')->user()->tutor_id) {
            $tutor_profile = app(TutorProfileRepository::class)
                ->find(\auth('user')->user()->tutor_id, ['id','status']);

            if ($tutor_profile->status === 'UnActive') {

                return redirect()->route('tutor.account_blocked');
            }
        }*/
        //$this->checkIfAuthorized($request);
        return $next($request);
    }
}
