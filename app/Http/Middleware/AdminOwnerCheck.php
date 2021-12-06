<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminOwnerCheck
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
        if (Auth()->check() && Auth()->user()->status == "active") {
            if (Auth()->user()->role == "admin" || Auth()->user()->role == "owner") {
                return $next($request);
            } else {
                return back();
            }
        } else {
            return back();
        }
    }
}
