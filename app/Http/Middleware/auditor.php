<?php

namespace App\Http\Middleware;

use Closure;

class auditor
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
        if(!Auth::check()) {
            return redirect('/login');
        } else {
            $user = Auth::user();
            if($user->hasRole('Auditor'))
            {
                return $next($request);
            } else {
                return redirect('/');
            }
        }
    }
}
