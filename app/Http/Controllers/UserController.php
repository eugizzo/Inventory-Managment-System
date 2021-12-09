<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Company;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function changeUserStatus($id)
    {
        $user = User::where('id', $id)->first();
        if ($user) {
            if ($user->status == "active") {
                $user->update([
                    'status' => ' inactive'
                ]);
                return redirect()->back()->with('success', 'User disabled');
            } elseif ($user->status == " inactive") {
                $user->update([
                    'status' => 'active'
                ]);
                return redirect()->back()->with('success', 'User activated');
            }
        } else {
            return redirect()->back()->with('warning', 'User not found');
        }
    }
    public function getUsers()
    {
        $users = User::where('role', '!=', 'admin')
            ->get();
        return view('user.users', ['users' => $users]);
    }

    public function getUpdateUser($id)
    {
        $user = User::where("id", $id)->first();
        if ($user) {
            return view('user.updateUser', compact('user'));
        } else {
            return redirect()->back()->with('warning', 'user not found');
        }
    }

    public function updateUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email',
            'dob' => 'required|date|before:today',
            'gender' => 'required',
            'phoneNumber' => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $user = User::where('email', $request->email)->where('id', '!=', $request->id)->first();
        if ($user) {
            return redirect()->back()->with('warning', 'email already registered with another user');
        }
        $user = User::where('phoneNumber', $request->phoneNumber)->where('id', '!=', $request->id)->first();
        if ($user) {
            return redirect()->back()->with('warning', 'phone number already registered with another user');
        }
        $user = User::where('id', $request->id)->first();
        if ($user) {
            $result = $user->update([
                'firstName' => $request->firstName,
                'lastName' => $request->lastName, 'email' => $request->email,
                'phoneNumber' => $request->phoneNumber, 'gender' => $request->gender,
                'dob' => $request->dob,
            ]);
            if ($result) {
                return redirect("getUsers")->with('success', 'User Updated successfully');
            } else {
                return redirect()->back()->with('warning', 'user update failed');
            }
        } else {
            return redirect()->back()->with('warning', 'user to update not found');
        }
    }
    public function getLandingPage()
    {
        $users = User::where('role', '!=', 'admin')->count();
        $activeUser = User::where('status', 'active')->count();
        $inActiveUser = User::where('status', 'inactive')->count();
        $companies = Company::count();
        $activeCompanies = Company::where('status', 'active')->count();
        $inActiveCompanies = Company::where('status', 'inactive')->count();
        $products = Product::count();
        $categories = Category::count();
        $brands = Brand::count();
        return view('user.landingPage', compact(
            'users',
            'activeUser',
            'inActiveUser',
            'companies',
            'activeCompanies',
            'inActiveCompanies',
            'products',
            'categories',
            'brands',
        ));
    }
    public function getOwnerLandingPage($id)
    {
        $branches = Branch::count();
        $products = Product::where('company_id', Auth::user()->company->id)->count();
        $topSelling = Product::where('company_id', Auth::user()->company->id)->get();
        $topSelling = Product::where('company_id', Auth::user()->company->id)->orderByDesc('soldQuantity')->first();
        $categories = Category::count();
        $brands = Brand::count();
        return view('user.ownerLandingPage', compact(
            'branches',
            'products',
            'categories',
            'brands',
            'topSelling'
        ));
    }
}
