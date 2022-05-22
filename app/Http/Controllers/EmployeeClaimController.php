<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignEmployee;
use App\Models\User;
use App\Models\EmployeeDepartment;
use App\Models\EmployeeDesignation;
use App\Models\EmployeeShift;
use App\Models\EmployeeSalaryLog;
use App\Models\EmployeeClaim;
use App\Models\EmployeeLeave;
use App\Models\ClaimPurpose;
use DB;
use PDF;
use Auth;

class EmployeeClaimController extends Controller
{
    public function ViewClaim(){
        $data['allData'] = EmployeeClaim::orderBy('id', 'desc') -> get();

        return view('hrweb.employee.claim.employee_claim_view', $data);
    }

    public function MyClaim(){
        $data['allData'] = EmployeeClaim::orderBy('id', 'desc') -> get();

        return view('hrweb.employee.claim.employee_claim_myclaim', $data);
    }

    public function ViewClaimAdmin(){
        $data['allData'] = EmployeeClaim::orderBy('id', 'desc') -> get();

        return view('adminweb.claim.employee_claim_status', $data);
    }

    public function ApproveClaim(Request $request, $id){
        $approve = EmployeeClaim::find($id);
        $approve -> status = 'Approved';
        $approve -> save();

        $data['allData'] = EmployeeClaim::orderBy('id', 'desc') -> get();

        return view('adminweb.claim.employee_claim_status', $data);
    }

    public function DeclineClaim(Request $request, $id){
        $decline = EmployeeClaim::find($id);
        $decline -> status = 'Unsuccessful';
        $decline -> save();

        $data['allData'] = EmployeeClaim::orderBy('id', 'desc') -> get();

        return view('adminweb.claim.employee_claim_status', $data);
    }

    public function ApplyClaim(){
        $data['employees'] = User::where('role', 'Employee') -> get();
        $data['claim_purpose'] = claimPurpose::all();
        
        return view('hrweb.employee.claim.employee_claim_apply', $data);
    }

    public function StoreClaim(Request $request, $id){
        if ($request -> claim_purpose_id == "0"){
            $claimpurpose = new claimPurpose();
            $claimpurpose -> name = $request -> name;
            $claimpurpose -> save();
            $claim_purpose_id = $claimpurpose -> id;
        } else {
            $claim_purpose_id = $request -> claim_purpose_id;
        }

        $data = new EmployeeClaim();
        $data -> employee_id = Auth::user() -> id;
        $data -> claim_purpose_id = $claim_purpose_id;
        $data -> claim_amount = $request -> claim_amount;
        $data -> claim_date = date('Y-m-d', strtotime($request -> claim_date)); 
        $data -> save();

        $notification = array(
            'message' => 'Claim Applied Successfully',
            'alert-type' => 'success',
        );

        return redirect() -> route('employee.claim.myclaim') -> with($notification);
    }

    public function DeleteClaim($employee_id){
        $deleteUsers = EmployeeClaim::find($employee_id);
        $deleteUsers -> delete();

        $notification = array(
            'message' => 'Employee Claim Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect() -> route('employee.claim.myclaim') -> with($notification);

    }
}
