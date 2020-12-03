<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Access
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
        if(Auth::check()){
            if((Auth::user()->used_as) !="teacher"){
                $request->session()->flash('danger','You dont have the access of that page or link');
                return redirect('/');
            }
        }

        return $next($request);
    }
}
