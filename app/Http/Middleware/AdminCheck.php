<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCheck
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
            if (Auth()->user()->role == "admin" && Auth()->user()->status == "active") {
                return $next($request);
            } else if (Auth()->user()->role == "owner" && Auth()->user()->status == "active") {
                return redirect()->route('getOwnerLandingPage', Auth::user()->company->id);
            } else if (Auth()->user()->role == "manager" && Auth()->user()->status == "active") {
                return redirect()->route('getCompanyProducts', Auth::user()->branch->company_id);
            }
            return back();
        } else {
            return back();
        }
    }
}
