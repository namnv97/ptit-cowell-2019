<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class superadmin
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
        if (Auth::check() && Auth::user()->roles > 6) {
            return $next($request);
        } else {
            if(Auth::check()) return redirect()->route('home');
            return redirect()->route('admin.dashboard');
        }
    }
}
