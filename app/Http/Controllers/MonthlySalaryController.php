<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignEmployee;
use App\Models\User;
use App\Models\EmployeeDepartment;
use App\Models\EmployeeDesignation;
use App\Models\EmployeeShift;
use App\Models\EmployeeSalaryLog;
use App\Models\EmployeeAttendance;
use DB;
use PDF;

class MonthlySalaryController extends Controller
{
    // public function ViewMonthlySalary(){
    //     return view('hrweb.employee.monthly_salary.monthly_salary_view');
    // }

    // public function MonthlySalaryGet(){
    //     $date = date('Y-m', strtotime($request -> date));
    // 	if ($date !='') {
    // 	    $where[] = ['date','like',$date.'%'];
    //     }
    // 	$data = EmployeeAttendance::select('employee_id') -> groupBy('employee_id') -> with(['user']) -> where($where) -> get();
    // 	$html['thsource']  = '<th>SL</th>';
    // 	$html['thsource'] .= '<th>Employee Name</th>';
    // 	$html['thsource'] .= '<th>Basic Salary</th>';
    // 	$html['thsource'] .= '<th>Salary This Month</th>';
    // 	$html['thsource'] .= '<th>Action</th>';


    // 	foreach ($data as $key => $attend) {
    // 	    $totalattendance = EmployeeAttendance::with(['user']) -> where($where) -> where('employee_id', $attend -> employee_id) -> get();
    //         $unpaidleavecount = count($totalattendance -> where('attendance_status', 'Unpaid Leave'));

    // 	 	$color = 'success';
    // 	 	$html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
    // 	 	$html[$key]['tdsource'] .= '<td>'.$attend['user']['name'].'</td>';
    // 	 	$html[$key]['tdsource'] .= '<td>'.$attend['user']['salary'].'</td>';
    	 	
    // 	 	$salary = (float)$attend['user']['salary'];
    // 	 	$salaryperday = (float)$salary/30;
    // 	 	$totalsalaryminus = (float)$unpaidleavecount * (float)$salaryperday;
    // 	 	$totalsalary = (float)$salary - (float)$totalsalaryminus;

    // 	 	$html[$key]['tdsource'] .='<td>'.$totalsalary.'$'.'</td>';
    // 	 	$html[$key]['tdsource'] .='<td>';
    // 	 	$html[$key]['tdsource'] .='<a class = "btn btn-sm btn-'.$color.'" title = "PaySlip" target = "_blanks" href = "'.route("employee.monthly.salary.payslip", $attend -> employee_id).'">Fee Slip</a>';
    // 	 	$html[$key]['tdsource'] .= '</td>';
    // 	 }  
    // 	return response()->json(@$html);
    // }

    // public function MonthlySalaryPayslip(Request $request,$employee_id){
    //     $id = EmployeeAttendance::where('employee_id',$employee_id)->first();
    //     $date = date('Y-m',strtotime($id->date));
    //     if ($date !='') {
    //        $where[] = ['date','like',$date.'%'];
    //     }

    //     $data['details'] = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$id->employee_id)->get();	 

    //     $pdf = PDF::loadView('backend.employee.monthly_salary.monthly_salary_pdf', $data);
    //     $pdf->SetProtection(['copy', 'print'], '', 'pass');
    //     return $pdf->stream('document.pdf');
    // }

    public function ViewMonthlySalary(){
    	return view('hrweb.employee.monthly_salary.monthly_salary_view');

    }


  public function MonthlySalaryGet(Request $request){
		
	 	$date = date('Y-m',strtotime($request->date));
    	if ($date !='') {
    	    $where[] = ['date','like',$date.'%'];
    	}
    	 
    	$data = EmployeeAttendance::select('employee_id')->groupBy('employee_id')->with(['user'])->where($where)->get();
    	$html['thsource']  = '<th>SL</th>';
    	$html['thsource'] .= '<th>Employee Name</th>';
    	$html['thsource'] .= '<th>Basic Salary</th>';
    	$html['thsource'] .= '<th>Salary This Month(RM) </th>';
    	$html['thsource'] .= '<th>Action</th>';

        foreach ($data as $key => $attend) {
    	$totalattend = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$attend->employee_id)->get();
     	$unpaidleavecount = count($totalattend->where('attendance_status','Unpaid Leave'));
    	$color = 'success';
    	$html[$key]['tdsource']  = '<td>'.($key+1).'</td>';
    	$html[$key]['tdsource'] .= '<td>'.$attend['user']['name'].'</td>';
    	$html[$key]['tdsource'] .= '<td>'.$attend['user']['salary'].'</td>';
    	 	 
    	$salary = (float)$attend['user']['salary'];
    	$salaryperday = (float)$salary/30;
    	$totalsalaryminus = (float)$unpaidleavecount*(float)$salaryperday;
    	$totalsalary = (float)$salary-(float)$totalsalaryminus;

    	$html[$key]['tdsource'] .='<td>'.$totalsalary.'</td>';
    	$html[$key]['tdsource'] .='<td>';
    	$html[$key]['tdsource'] .='<a class="btn btn-sm btn-'.$color.'" title="PaySlip" target="_blanks" href="'.route("employee.monthly.salary.payslip",$attend->employee_id).'">Pay Slip</a>';
    	$html[$key]['tdsource'] .= '</td>';

    	 }  
    	return response()->json(@$html);
 

  } // END Method 


  	public function MonthlySalaryPayslip(Request $request,$employee_id){
  		$id = EmployeeAttendance::where('employee_id',$employee_id)->first();
  		$date = date('Y-m',strtotime($id->date));
    	 if ($date !='') {
    	 	$where[] = ['date','like',$date.'%'];
    	 }

    $data['details'] = EmployeeAttendance::with(['user'])->where($where)->where('employee_id',$id->employee_id)->get();	 

    $pdf = PDF::loadView('hrweb.employee.monthly_salary.monthly_salary_pdf', $data);
	$pdf->SetProtection(['copy', 'print'], '', 'pass');
	return $pdf->stream('document.pdf');

  	}
}
