<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if (Auth()->check()) {
            if (Auth()->user()->status == "active") {
                if (Auth()->user()->role == "admin" || Auth()->user()->role == "owner") {
                    return $next($request);
                } else if (Auth()->user()->role == "owner" && Auth()->user()->company->status == "active") {
                    return $next($request);
                } else if (Auth()->user()->role == "manager" && Auth()->user()->branch->status == "active") {
                    return redirect()->route('getCompanyProducts', Auth::user()->branch->company_id);
                } else {
                    return back()->with('warning', 'your company or branch account is not active');
                }
            } else {
                return back()->with('warning', 'your account is not active');
            }
        } else {
            return back()->with('warning', 'you must be loggedIn to access this resource');
        }
    }
}
