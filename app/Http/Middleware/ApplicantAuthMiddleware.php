<?php

namespace App\Http\Middleware;

use Closure;

class ApplicantAuthMiddleware
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
        if(!auth('applicant')->check()){
            return redirect(route('applicant.login.show'));
        }
        return $next($request);
    }
}
