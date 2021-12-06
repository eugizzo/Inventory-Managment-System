<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ManagerCheck
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
        if (Auth()->check()) {
            if (Auth()->user()->role == "manager" && Auth()->user()->status == "active" && Auth()->user()->branch->status == "active") {
                return $next($request);
            }
            return back();
        } else {
            return back();
        }
    }
}
