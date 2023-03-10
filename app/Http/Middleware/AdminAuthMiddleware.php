<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
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
        if(!empty(Auth::user()))
        {   //if user is have , can't go login page and register page
            if(url()->current() == route('auth#loginPage') || url()->current() == route('auth#registerPage'))
            {
                return back();
            }

            if(Auth::user()->role != 'admin')
            {
                 return back();
            }

            return $next($request);//this is middleware and it will return back when not user
        }

        return $next($request);
    }
}
