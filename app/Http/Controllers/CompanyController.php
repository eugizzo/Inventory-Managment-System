<?php

namespace App\Http\Controllers;

use App\Mail\Mail as MailMail;
use App\Models\Branch;
use App\Models\Company;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class CompanyController extends Controller
{
    public function getAddCompany()
    {
        return view('company.registerCompany');
    }
    public function randomPassword()
    {
        $alphabet = '1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 5; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    public function addCompany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:companies',
            'location' => 'required|string',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email|unique:users',
            'dob' => 'required|date|before:today',
            'gender' => 'required',
            'phoneNumber' => 'required|string|unique:users',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;
        $user->role = "owner";
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $password = $this->randomPassword();
        $user->password = Hash::make($password);
        $result = $user->save();
        if ($result) {
            $company = new Company();
            $company->name = $request->name;
            $company->location = $request->location;
            $company->user_id = $user->id;
            $result = $company->save();
            $message = "Dear $user->firstName, your company registration was successfully made, your password is $password";
            $details = [
                'message' => "Dear $user->firstName, your company registration was successfully made, your password is $password",
            ];
            try {
                sendMessage($user->phoneNumber, $message);
                Mail::to("$user->email")->send(new MailMail($details));
            } catch (Exception $e) {
            }
            if ($result) {
                return redirect("getAllCompanies")->with('success', 'Company saved successsfully');
            } else {
                return redirect()->back()->with('warning', 'Company operation failed!');
            }
        } else {
            return redirect()->back()->with('warning', 'Company operation failed!');
        }
    }
    public function getUpdateCompany($id)
    {
        $id = Crypt::decrypt($id);
        $company = Company::where("id", $id)->first();
        if ($company) {
            return view('company.updateCompany', ['company' => $company]);
        } else {
            return redirect()->back()->with('warning', 'operation failed!');
        }
    }
    public function updateCompany(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required|string',
            'location' => 'required|string',

        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $company = Company::where('name', $request->name)->where('id', '!=', $request->id)->first();
        if ($company) {
            return redirect()->back()->with('warning', 'name already registered with another company');
        }
        $company = company::where("id", $request->id)->first();
        if ($company) {
            $result = $company->update([
                'name' => $request->name,
                'location,' => $request->location,
            ]);
            if ($result) {
                return redirect("getAllCompanies")->with('success', 'Company updated successsfully');
            } else {
                return redirect()->back()->with('warning', 'operation failed!');
            }
        } else {
            return redirect()->back()->with('warning', 'company to update not found');
        }
    }
    public function getChangeOwner($id)
    {
        $id = Crypt::decrypt($id);
        return view('company.changeOwner', ['id' => $id]);
    }

    public function changeOwner(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'email' => 'required|email|unique:users',
            'dob' => 'required|date|before:today',
            'gender' => 'required',
            'phoneNumber' => 'required|string|unique:users',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $company = company::where('id', $request->id)->first();
        if ($company) {
            $user = User::where('id', $company->user->id)->first();
            if ($user) {
                $result = $user->update([
                    'status' => 'inactive'
                ]);
                if ($result) {
                    $user = new User();
                    $user->firstName = $request->firstName;
                    $user->lastName = $request->lastName;
                    $user->email = $request->email;
                    $user->phoneNumber = $request->phoneNumber;
                    $user->role = "owner";
                    $user->gender = $request->gender;
                    $user->dob = $request->dob;
                    $password = $this->randomPassword();
                    $user->password = Hash::make($password);
                    $result = $user->save();
                    $message = "Dear $user->firstName, your company registration was successfully made, your password is $password";
                    $details = [
                        'message' => "Dear $user->firstName, your are the company registration was successfully made, your password is $password",
                    ];
                    try {
                        sendMessage($user->phoneNumber, $message);
                        Mail::to("$user->email")->send(new MailMail($details));
                    } catch (Exception $e) {
                    }

                    if ($result) {
                        $result = $company->update([
                            'user_id' => $user->id
                        ]);
                        if ($result) {
                            return redirect("getAllCompanies")->with('success', 'Company owner changed successfully');
                        } else {
                            return redirect()->back()->with('warning', 'company owner update failed');
                        }
                    } else {
                        return redirect()->back()->with('warning', 'failed to seve the new owner');
                    }
                } else {
                    return redirect()->back()->with('warning', 'failed to desactivated last company owner');
                }
            } else {
                return redirect()->back()->with('warning', 'Last Owner not found');
            }
        } else {
            return redirect()->back()->with('warning', 'Company not found');
        }
    }
    public function getCompanyById($id)
    {
        $company = company::where('id', $id)->first();
        if ($company) {
        } else {
            return redirect()->back()->with('warning', 'Company not found');
        }
    }
    public function getAllCompanies()
    {
        $companies = company::all();
        if ($companies) {
            return view('company.companies', ['companies' => $companies]);
        } else {
            return redirect()->back()->with('warning', 'operation failed!');
        }
    }
    public function getCompanyBranches($id)
    {
        $id = Crypt::decrypt($id);
        $branches = Branch::where('company_id', $id)->get();
        if ($branches) {
            $company = company::where('id', $id)->first();
            return view('branch.branches', compact('branches', 'company'));
        } else {
            return redirect()->back()->with('warning', 'operation failed!');
        }
    }
    public function changeCompanyStatus($id)
    {
        $id = Crypt::decrypt($id);
        $company = Company::where('id', $id)->first();
        if ($company) {
            if ($company->status == "active") {
                $company->update([
                    'status' => ' inactive'
                ]);
                return redirect()->back()->with('success', 'Company disabled');
            } else if ($company->status == " inactive") {
                $company->update([
                    'status' => 'active'
                ]);
                return redirect()->back()->with('success', 'Company activated');
            }
        } else {
            return redirect()->back()->with('warning', 'Company not found');
        }
    }

    public function deleteCompany($id)
    {
        $id = Crypt::decrypt($id);
        $company = Company::where("id", $id)->first();
        $branch = Branch::where("company_id", $id)->first();
        if ($branch) {
            return redirect()->back()->with('warning', 'Company Already has branches you may disable it status');
        }
        if ($company) {
            $user = User::where('id', $company->user_id)->first();
            $result = $company->delete();
            $results = $user->delete();
            if ($result && $results) {
                return redirect("getAllCompanies")->with('success', 'Company delete successsfully');
            } else {
                return redirect()->back()->with('warning', 'company delete failed!');
            }
        } else {
            return redirect()->back()->with('warning', 'Company not found');
        }
    }
}
