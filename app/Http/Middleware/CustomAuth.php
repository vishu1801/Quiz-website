<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(($request->path()=="login" || $request->path()=="register") && Auth::check()){
            $request->session()->flash('status','You are already Authenticated');
            return redirect("/");
        }
        return $next($request);
    }
}
