<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeFeedback;
use Auth;
use App\Models\AssignEmployee;
use App\Models\EmployeeDepartment;
use App\Models\EmployeeDesignation;
use App\Models\EmployeeShift;
use App\Models\EmployeeSalaryLog;
use App\Models\EmployeeClaim;
use App\Models\EmployeeLeave;
use App\Models\ClaimPurpose;
use DB;
use PDF;

class FeedbackController extends Controller
{
    public function ViewFeedback(){
        $data['allData'] = EmployeeFeedback::all();

        return view('adminweb.feedback.view_feedback', $data);
    }

    public function WriteFeedback(){
        $data['employees'] = User::where('role', 'Employee') -> get();
        // $data['claim_purpose'] = claimPurpose::all();

        return view('hrweb.employee.feedback.employee_write_feedback', $data);
    }

    public function StoreFeedback(Request $request, $employee_id){
        $data = new EmployeeFeedback();
        $data -> employee_id = Auth::user() -> id;
        $data -> feedback = $request -> feedback;
        $data -> save();

        $notification = array(
            'message' => 'Feedback Successfully Uploaded',
            'alert-type' => 'success',
        );

        return redirect() -> route('dashboard') -> with($notification);
    }

    public function DeleteFeedback($employee_id){
        $deleteUsers = EmployeeFeedback::find($employee_id);
        $deleteUsers -> delete();

        $notification = array(
            'message' => 'Employee Feedback Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect() -> route('employee.feedback.view') -> with($notification);

    }
}
