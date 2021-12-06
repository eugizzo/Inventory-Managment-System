<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OwnerCheck
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
            if (Auth()->user()->role == "owner" && Auth()->user()->status == "active" && Auth()->user()->company->status == "active") {
                return $next($request);
            }
            return back();
        } else {
            return back();
        }
    }
}
