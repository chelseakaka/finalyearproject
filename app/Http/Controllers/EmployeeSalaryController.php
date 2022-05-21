<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignEmployee;
use App\Models\User;
use App\Models\EmployeeDepartment;
use App\Models\EmployeeDesignation;
use App\Models\EmployeeShift;
use App\Models\EmployeeSalaryLog;
use DB;
use PDF;

class EmployeeSalaryController extends Controller
{
    public function ViewSalary(){
        $data['allData'] = User::where('role', 'Employee') -> get();

        return view ('hrweb.employee.salary.employee_salary_view', $data);
    }

    public function SalaryIncrement($employee_id){
        $data['editData'] = User::find($employee_id);

        return view ('hrweb.employee.salary.employee_salary_increment', $data);
    }

    public function StoreSalary(Request $request, $employee_id){
        $user = User::find($employee_id);
        $previous_salary = $user -> salary;
        $present_salary = (float) $previous_salary + (float) $request -> increment_salary;
        $user -> salary = $present_salary;
        $user -> save();

        $salaryData = new EmployeeSalaryLog();
        $salaryData -> employee_id = $employee_id;
        $salaryData -> previous_salary = $previous_salary;
        $salaryData -> present_salary = $present_salary;
        $salaryData -> increment_salary = $request -> increment_salary;
        $salaryData -> effected_salary = date('Y-m-d', strtotime ($request -> effected_salary));
        $salaryData -> save();

        $notification = array(
            'message' => 'Employee Salary Increment Successfully',
            'alert-type' => 'success',
        );

        return redirect() -> route('employee.salary.view') -> with($notification);
    }

    public function SalaryDetails($id){
        $data['details'] = User::find($id);
        $data['salary_log'] = EmployeeSalaryLog::where('employee_id', $data['details'] -> id) -> get();

        return view('hrweb.employee.salary.employee_salary_details', $data);
    }
}
