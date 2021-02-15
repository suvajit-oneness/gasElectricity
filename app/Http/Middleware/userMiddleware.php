<?php

namespace App\Http\Middleware;

use Closure;use Auth;use Session;

class userMiddleware
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
        if(Auth::user() && Auth::user()->user_type != 1){
            return $next($request);    
        }
        Session::flash('error', 'Session Timeout please login again'); 
        return redirect('/login');
    }
}
