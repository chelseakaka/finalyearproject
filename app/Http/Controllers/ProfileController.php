<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\AssignEmployee;
use PDF;

class ProfileController extends Controller
{
    // public function ViewProfile(){
    //     $id = Auth::user() -> id;
    //     $user = User::find($id);

    //     $user['allData'] = AssignEmployee::where('employee_id', $user['id']) -> where('employee_id', $user['id']) -> get();
    //     // $user['allData'] = AssignEmployee::with(['Employee']) -> where('employee_id', $employee_id) -> first();        
    //     // $user['details'] = AssignEmployee::with(['Employee']) -> where('employee_id', $employee_id) -> first();

    //     return view('employee.my_profile', compact('user')); 
    // }

    public function ViewProfile($employee_id){
        $data['details'] = AssignEmployee::with(['Employee']) -> where('employee_id', $employee_id) -> first();

        $pdf = PDF::loadview('hrweb.employee.employee_details_pdf', $data);
        $pdf -> setProtection(['copy', 'print'], '', 'pass');

        return $pdf -> stream('document.pdf');
    }

    public function ViewPassword(){
        return view('employee.edit_password');
    }

    public function UpdatePassword(Request $request){
        $validateUser = $request -> validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hashedPassword = Auth::user() -> password;
        if (Hash::check($request -> oldpassword, $hashedPassword)){
            $user = User::find(Auth::id());
            $user -> password = Hash::make($request -> password);
            $user -> save();
            Auth::logout();
            return redirect() -> route('login');
        } else {
            return redirect() -> back();
        }
    }
}
