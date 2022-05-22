<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignEmployee;
use App\Models\User;
use App\Models\EmployeeDepartment;
use App\Models\EmployeeDesignation;
use App\Models\EmployeeShift;
use App\Models\EmployeeSalaryLog;
use App\Models\EmployeeLeave;
use App\Models\LeavePurpose;
use DB;
use PDF;
use Auth;

class EmployeeLeaveController extends Controller
{
    public function ViewLeave(){
        $data['allData'] = EmployeeLeave::orderBy('id', 'desc') -> get();

        return view('hrweb.employee.leave.employee_leave_view', $data);
    }

    public function MyLeave(){
        $data['allData'] = EmployeeLeave::orderBy('id', 'desc') -> get();

        return view('hrweb.employee.leave.employee_leave_myleave', $data);
    }

    public function ViewLeaveAdmin(){
        $data['allData'] = EmployeeLeave::orderBy('id', 'desc') -> get();

        return view('adminweb.leave.employee_leave_status', $data);
    }

    public function ApproveLeave(Request $request, $id){
        $approve = EmployeeLeave::find($id);
        $approve -> status = 'Approved';
        $approve -> save();

        $data['allData'] = EmployeeLeave::orderBy('id', 'desc') -> get();

        return view('adminweb.leave.employee_leave_status', $data);
    }

    public function DeclineLeave(Request $request, $id){
        $decline = EmployeeLeave::find($id);
        $decline -> status = 'Unsuccessful';
        $decline -> save();

        $data['allData'] = EmployeeLeave::orderBy('id', 'desc') -> get();

        return view('adminweb.leave.employee_leave_status', $data);
    }

    public function ApplyLeave(){
        $data['employees'] = User::where('role', 'Employee') -> get();
        $data['leave_purpose'] = LeavePurpose::all();
        
        return view('hrweb.employee.leave.employee_leave_apply', $data);
    }

    public function StoreLeave(Request $request, $id){
        if ($request -> leave_purpose_id == "0"){
            $leavepurpose = new LeavePurpose();
            $leavepurpose -> name = $request -> name;
            $leavepurpose -> save();
            $leave_purpose_id = $leavepurpose -> id;
        } else {
            $leave_purpose_id = $request -> leave_purpose_id;
        }

        $data = new EmployeeLeave();
        $data -> employee_id = Auth::user() -> id;
        $data -> leave_purpose_id = $leave_purpose_id;
        $data -> start_date = date('Y-m-d', strtotime($request -> start_date)); 
        $data -> end_date = date('Y-m-d', strtotime($request -> end_date)); 
        $data -> save();

        $notification = array(
            'message' => 'Leave Applied Successfully',
            'alert-type' => 'success',
        );

        return redirect() -> route('employee.leave.myleave') -> with($notification);
    }

    public function DeleteLeave($employee_id){
        $deleteUsers = EmployeeLeave::find($employee_id);
        $deleteUsers -> delete();

        $notification = array(
            'message' => 'Employee Leave Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect() -> route('employee.leave.myleave') -> with($notification);

    }
}
