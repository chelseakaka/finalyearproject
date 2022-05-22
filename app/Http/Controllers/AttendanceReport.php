<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmployeeAttendance;
use PDF;


class AttendanceReport extends Controller
{
    public function AttendanceReportView(){
        $data['employees'] = User::where('role', 'Employee') -> get();

        return view('adminweb.report.attendance_report_view', $data);
    }

    public function GetAttendanceReport(Request $request){
        $employee_id = $request -> employee_id;
        if($employee_id != ''){
            $where[] = ['employee_id', $employee_id];
        }
        $date = date('Y-m', strtotime($request -> date));
        if($date != ''){
            $where[] = ['date', 'like',$date.'%'];
        }

        $attendance = EmployeeAttendance::with(['user']) -> where($where) -> get();
        if($attendance == true){
            $data['allData'] = EmployeeAttendance::with(['user']) -> where($where) -> get();

            $data['unpaid'] = EmployeeAttendance::with(['user']) -> where($where) -> where('attendance_status', 'Unpaid Leave') -> get() -> count();
            $data['leave'] = EmployeeAttendance::with(['user']) -> where($where) -> where('attendance_status', 'On Leave') -> get() -> count();

            $data['month'] = date('Y-m', strtotime($request -> date));

            $pdf = PDF::loadview('adminweb.report.attendance_report_pdf', $data);
            $pdf -> setProtection(['copy', 'print'], '', 'pass');

            return $pdf -> stream('document.pdf');
        }else{
            $notification = array(
                'message' => 'Sorry, The Criteria Does Not Match',
                'alert-type' => 'error',
            );
    
            return redirect()->back()->with($notification);
        }
    }
}
