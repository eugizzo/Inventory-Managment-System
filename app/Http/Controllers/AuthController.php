<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }
    public function checkLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required|string|min:5',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $input = $request->all();
        $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'phoneNumber';
        if (Auth::attempt([$fieldType => $input['email'], 'password' => $input['password']])) {
            if (Auth::user()->status === "active") {
                if (Auth::user()->role === "admin") {
                    return  redirect('getLandingPage');
                } else if (Auth()->user()->role == "owner") {
                    return redirect()->route('getOwnerLandingPage', Auth::user()->company->id);
                } else if (Auth()->user()->role == "manager") {
                    return redirect()->route('getCompanyProducts', Auth::user()->branch->company_id);
                }
            } else {
                return back()->with('warning', 'your account was disabled, contact admin');
            }
        }
        return back()->withInput()->with('danger', 'invalid email or password');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('getLogin')->with('success', 'User successfully signed out');
    }
}
