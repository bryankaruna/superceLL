<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    //middleware untuk guest
    public function handle($request, Closure $next)
    {
        if(Auth::guest()){
            return $next($request);
        }
        
        return back();
    }
}
