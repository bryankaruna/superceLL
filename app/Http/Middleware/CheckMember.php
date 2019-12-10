<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class CheckMember
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    //middleware untuk member
    public function handle($request, Closure $next)
    {
        if(Auth::check() && Auth::user()->role == "member")
            return $next($request);
        
        return back();
    }
}
