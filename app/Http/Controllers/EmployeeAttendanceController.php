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
use App\Models\EmployeeAttendance;
use DB;
use PDF;
use Auth;

class EmployeeAttendanceController extends Controller
{
    public function ViewAttendance(){
        $data['allData'] = EmployeeAttendance::select('date') -> groupBy('date') -> orderBy('date', 'DESC') -> get();
        // $data['allData'] = EmployeeAttendance::orderBy('id', 'DESC') -> get();

        return view('hrweb.employee.attendance.employee_attendance_view', $data);
    }

    public function AddAttendance(){
        $data['employees'] = User::where('role', 'Employee') -> get();

        return view('hrweb.employee.attendance.employee_attendance_add', $data);
    }

    public function StoreAttendance(Request $request){
        EmployeeAttendance::where('date', date('Y-m-d', strtotime($request -> date))) -> delete();
        $countemployee = count($request -> employee_id);
        for ($i = 0; $i < $countemployee; $i++){
            $attendance_status = 'attendance_status'.$i;
            $attend = new EmployeeAttendance();
            $attend -> date = date('Y-m-d', strtotime($request -> date));
            $attend -> employee_id = $request -> employee_id[$i];
            $attend -> attendance_status = $request -> $attendance_status;
            $attend -> save();
        }

        $notification = array(
            'message' => 'Employee Attendance Update Successfully',
            'alert-type' => 'success',
        );

        return redirect() -> route('employee.attendance.view') -> with($notification);
    }

    public function EditAttendance($date){
        $data['editData'] = EmployeeAttendance::where('date',$date)->get();
    	$data['employees'] = User::where('role','Employee')->get();

        return view('hrweb.employee.attendance.employee_attendance_edit', $data);
    } 

    public function AttendanceDetails($date){
        $data['details'] = EmployeeAttendance::where('date',$date)->get();

        return view('hrweb.employee.attendance.employee_attendance_details', $data);
    }
}
