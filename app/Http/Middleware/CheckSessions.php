<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 

class CheckSessions
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
        if(!Auth::check()){
            $request->session()->flash('danger','Please Authenticate yourself first.');
            return redirect("/");
        }
        return $next($request);
    }
}
