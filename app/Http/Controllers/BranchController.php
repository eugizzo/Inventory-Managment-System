<?php

namespace App\Http\Controllers;

use App\Mail\Mail as MailMail;
use App\Models\Branch;
use App\Models\StockIn;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class BranchController extends Controller
{
    public function getAddBranch()
    {
        return view('branch.registerBranch');
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
    public function addBranch(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'address' => 'required|string',
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
        $branch = Branch::where('name', $request->name)->where('company_id', '==', Auth::user()->company->id)->first();
        if ($branch) {
            return redirect()->back()->with('warning', 'name already registered with another branch');
        }
        $user = new User();
        $user->firstName = $request->firstName;
        $user->lastName = $request->lastName;
        $user->email = $request->email;
        $user->phoneNumber = $request->phoneNumber;
        $user->role = "manager";
        $user->gender = $request->gender;
        $user->dob = $request->dob;
        $password = $this->randomPassword();
        $user->password = Hash::make($password);
        $result = $user->save();
        if ($result) {
            $branch = new Branch();
            $branch->name = $request->name;
            $branch->address = $request->address;
            $branch->user_id = $user->id;
            $branch->company_id = Auth::user()->company->id;
            $result = $branch->save();
            $company = Auth::user()->company->name;
            $message = "Dear $user->firstName, your are the new manager of $branch->name branch in $company   , your password is $password";
            $details = [
                'message' => "Dear $user->firstName, your are the new manager of $branch->name branch in  $company , your password is $password",
            ];
            try {
                sendMessage($user->phoneNumber, $message);
                Mail::to("$user->email")->send(new MailMail($details));
            } catch (Exception $e) {
            }
            if ($result) {
                return redirect()->route("getCompanyBranches", Auth::user()->company->id)->with('success', 'Branch saved successsfully');
            } else {
                return redirect()->back()->with('warning', 'Branch saving failed');
            }
        } else {
            return redirect()->back()->with('warning', 'manager saving failed');
        }
    }
    public function getUpdateBranch($id)
    {
        $id = Crypt::decrypt($id);
        $branch = branch::where("id", $id)->first();
        if ($branch) {
            return view('branch.updateBranch', ['branch' => $branch]);
        } else {
            return redirect()->back()->with('warning', 'operation failed!');
        }
    }
    public function updateBranch(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'address' => 'required',
            'name' => 'required|string',
        ]);
        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        $branch = Branch::where('name', $request->name)->where('id', '!=', $request->id)->where('company_id', '==', Auth::user()->company->id)->first();
        if ($branch) {
            return redirect()->back()->with('warning', 'name already registered with another branch');
        }
        $branch = branch::where("id", $request->id)->first();
        if ($branch) {
            $result = $branch->update([
                'address' => $request->address,
                'name' => $request->name
            ]);
            if ($result) {
                return redirect()->route("getCompanyBranches", Crypt::encrypt($branch->company_id))->with('success', 'Branch updated successsfully');
            } else {
                return redirect()->back()->with('warning', 'operation failed!');
            }
        } else {
            return redirect()->back()->with('warning', 'branch to update not found');
        }
    }
    public function getChangeManager($id)
    {
        $id = Crypt::decrypt($id);
        return view('branch.changeManager', ['id' => $id]);
    }
    public function changeManager(Request $request)
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
        $branch = Branch::where('id', $request->id)->first();
        if ($branch) {
            $user = User::where('id', $branch->user->id)->first();
            if ($user) {
                $result = $user->update([
                    'status' => 'inactive'
                ]);
                if ($result) {
                    $$user = new User();
                    $user->firstName = $request->firstName;
                    $user->lastName = $request->lastName;
                    $user->email = $request->email;
                    $user->phoneNumber = $request->phoneNumber;
                    $user->role = "manager";
                    $user->gender = $request->gender;
                    $user->dob = $request->dob;
                    $password = $this->randomPassword();
                    $user->password = Hash::make($password);
                    $result = $user->save();
                    $company = Auth::user()->company->name;
                    $message = "Dear $user->firstName, your are the new manager of $branch->name branch in $company  , your password is $password";
                    $details = [
                        'message' => "Dear $user->firstName, your are the new manager of $branch->name branch in $company   , your password is $password",
                    ];
                    try {
                        sendMessage($user->phoneNumber, $message);
                        Mail::to("$user->email")->send(new MailMail($details));
                    } catch (Exception $e) {
                    }
                    if ($result) {
                        $result = $branch->update([
                            'user_id' => $user->id
                        ]);
                        if ($result) {
                            return redirect()->route("getCompanyBranches", Crypt::encrypt($branch->company_id))->with('success', 'Branch manager changed successfully');
                        } else {
                            return redirect()->back()->with('warning', 'branch manager update failed');
                        }
                    }
                } else {
                    return redirect()->back()->with('warning', 'failed to desactivated last branch manager');
                }
            } else {
                return redirect()->back()->with('warning', 'Last manager not found');
            }
        } else {
            return redirect()->back()->with('warning', 'Branch not found');
        }
    }

    public function changeBranchStatus($id)
    {
        $id = Crypt::decrypt($id);
        $branch = Branch::where('id', $id)->first();
        if ($branch) {
            if ($branch->status == "active") {
                $branch->update([
                    'status' => ' inactive'
                ]);
                return redirect()->back()->with('success', 'Branch disabled');
            } else if ($branch->status == " inactive") {
                $branch->update([
                    'status' => 'active'
                ]);
                return redirect()->back()->with('success', 'Branch activated');
            }
        } else {
            return redirect()->back()->with('warning', 'Branch not found');
        }
    }

    public function deleteBranch($id)
    {
        $id = Crypt::decrypt($id);
        $branch = Branch::where("id", $id)->first();
        $stockin = StockIn::where("branch_id", $id)->first();
        if ($stockin) {
            return redirect()->back()->with('warning', 'Branch Already has stocks');
        }
        if ($branch) {
            $user = User::where('id', $branch->user_id)->first();
            if ($user) {
                $results = $branch->delete();
                $result =  $user->delete();
            }
            if ($result && $results) {
                return redirect()->route("getCompanyBranches", Crypt::encrypt($branch->company_id))->with('success', 'Branch deleted successsfully');
            } else {
                return redirect()->back()->with('warning', 'branch deletion failed!');
            }
        } else {
            return redirect()->back()->with('warning', 'branch not found');
        }
    }
}
