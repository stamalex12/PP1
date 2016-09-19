<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Auth;
class Manager
{
    public function handle($request, Closure $next)
    {
        if(!Auth::check()) {
            return redirect('/login');
        } else {
            $user = Auth::user();
            if($user->hasRole('Admin'))
            {
                return $next($request);
            } else {
                return redirect('/');
            }
        }
    }
}
