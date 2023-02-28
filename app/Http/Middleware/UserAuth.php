<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->check()){
            if((isset(auth()->user()->id))){
                return redirect()->route('getLogin')->with('error','You have to be sure user to access this page');
            }
        }else{
            return redirect()->route('getLogin')->with('error','You have to be logged in to access this page');
        }
        return $next($request);
    }
}
