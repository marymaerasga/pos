<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        if(Auth::check()){
            if(Auth::user()->role_as == '1'){
                return $next($request);
            }
            if(Auth::user()->role_as == '2'){
                return redirect('/redirects')->with('message', 'Access denied as you are not Admin!');
            }
            else{
                return redirect('/redirects')->with('message', 'Access denied as you are not Admin!');
            }
        }else{
            return redirect('/login')->with('message', 'Login to access the website');
        }

        return $next($request);
    }
}
