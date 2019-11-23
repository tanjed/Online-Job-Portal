<?php

namespace App\Http\Middleware;

use Closure;

class CompanyAuthMiddleware
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
        if(!auth('company')->check()){
            return redirect(route('company.login.show'));
        }
        return $next($request);
    }
}
