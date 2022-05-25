<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignEmployee;
use App\Models\Employee;
use App\Models\User;
use App\Models\EmployeeDepartment;
use App\Models\EmployeeDesignation;
use App\Models\EmployeeShift;
use App\Models\EmployeeSalaryLog;
use App\Models\EmployeeLeave;
use DB;
use PDF;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class EmployeeController extends Controller
{
    public function ViewEmployee(){
        $data['allData'] = DB::table('users') -> where('role', 'Employee') -> orderBy('joineddate', 'asc') -> get();

        return view('hrweb.employee.view_employee', $data);
    }

    public function ViewEmployeeForEmployee(){
        $data['allData'] = User::all() -> where('role', 'Employee');

        return view('hrweb.employee.employee_view_for_employee', $data);
    }

    public function AddEmployee(){
        $data['designation'] = EmployeeDesignation::all();
        $data['department'] = EmployeeDepartment::all();
        $data['shift'] = EmployeeShift::all();

        return view('hrweb.employee.add_employee', $data);
    }

    public function StoreEmployee(Request $request){
        DB::transaction(function() use($request){
            $checkYear = date('Y-m-d', strtotime($request -> joineddate));
            $employee = User::where('role', 'Employee') -> orderBy('id', 'DESC') -> first();

            if ($employee == null) {
                $firstReg = 0;
                $employeeID = $firstReg + 1;
                if ($employeeID < 10) {
                    $id_no = '000'.$employeeID;
                } elseif ($employeeID < 100) {
                    $id_no = '00'.$employeeID;
                } elseif ($employeeID < 1000) {
                    $id_no = '0'.$employeeID;
                }
            } else {
                $employee = User::where('role', 'Employee') -> orderBy('id', 'DESC') -> first() -> id;
                $employeeID = $employee + 1;
                if ($employeeID < 10) {
                    $id_no = '000'.$employeeID;
                } elseif ($employeeID < 100) {
                    $id_no = '00'.$employeeID;
                } elseif ($employeeID < 1000) {
                    $id_no = '0'.$employeeID;
                }
            }

            $final_id_no = $checkYear.$id_no;
            $data  = new User();
            $code = rand(000000, 999999);
            $data -> id_no = $final_id_no;
            $data -> password = bcrypt($code);
            $data -> role = 'Employee';
            $data -> code = $code;
            $data -> name = $request -> name;
            $data -> email = $request -> email;
            $data -> phonenumber = $request -> phonenumber;
            $data -> address = $request -> address;
            $data -> gender = $request -> gender;
            $data -> religion = $request -> religion;
            $data -> dob = date('Y-m-d', strtotime($request -> dob));
            $data -> nationality = $request -> nationality;
            $data -> salary = $request -> salary;
            $data -> joineddate = date('Y-m-d', strtotime($request -> joineddate));
            $data -> bankaccount = $request -> bankaccount;
            $data -> maritalstatus = $request -> maritalstatus;

            if ($request->file('image')) {
                $file = $request->file('image');
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_images'),$filename);
                $data['image'] = $filename;
            }
            $data -> save();

            // Mail::to($data->email)->send(new SendEmail($data));

            $employee_salary  = new EmployeeSalaryLog();
            $employee_salary -> employee_id = $data -> id;
            $employee_salary -> effected_salary = date('Y-m-d', strtotime($request -> joineddate));
            $employee_salary -> previous_salary = $request -> salary;
            $employee_salary -> present_salary = $request -> salary;
            $employee_salary -> increment_salary = '0';
            $employee_salary -> save();

            $assign_employee  = new AssignEmployee();
            $assign_employee -> employee_id = $data -> id;
            // $assign_employee -> year_id = $request -> year_id;
            $assign_employee -> department_id = $request -> department_id;
            $assign_employee -> designation_id = $request -> designation_id;
            $assign_employee -> shift_id = $request -> shift_id;
            $assign_employee -> save();
        });

            $notification = array(
                'message' => 'Employee Successfully Added',
                'alert-type' => 'success',
            );
    
            return redirect() -> route('employee.registration.view') -> with($notification);
    }

    public function EditEmployee($employee_id){
        $data['editData'] = User::find($employee_id);
        $data['department'] = EmployeeDepartment::all();
        $data['designation'] = EmployeeDesignation::all();
        $data['shift'] = EmployeeShift::all();

        $data['editData'] = AssignEmployee::with(['Employee']) -> where('employee_id', $employee_id) -> first();

        return view('hrweb.employee.edit_employee', $data);
    }

    public function UpdateEmployee(Request $request, $employee_id){
        DB::transaction(function() use($request, $employee_id){
            $data  = User::where('id', $employee_id) -> first();
            $data -> name = $request -> name;
            $data -> phonenumber = $request -> phonenumber;
            $data -> address = $request -> address;
            $data -> gender = $request -> gender;
            $data -> religion = $request -> religion;
            $data -> dob = date('Y-m-d', strtotime($request -> dob));
            $data -> nationality = $request -> nationality;
            $data -> salary = $request -> salary;
            $data -> joineddate = $request -> joineddate;
            $data -> bankaccount = $request -> bankaccount;
            $data -> maritalstatus = $request -> maritalstatus;
            if ($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/employee_images/'.$data->image));
                $filename = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_images'),$filename);
                $data['image'] = $filename;
            }
            $data -> save();

            $assign_employee  = AssignEmployee::where('employee_id', $request -> employee_id) -> where('employee_id', $employee_id) -> first();
            $assign_employee -> department_id = $request -> department_id;
            $assign_employee -> designation_id = $request -> designation_id;
            $assign_employee -> shift_id = $request -> shift_id;
            $assign_employee -> save();
        });

            $notification = array(
                'message' => 'Employee Successfully Edited',
                'alert-type' => 'success',
            );
    
            return redirect() -> route('employee.registration.view') -> with($notification);
    }

    public function EmployeeDetails($employee_id){
        $data['details'] = AssignEmployee::with(['Employee']) -> where('employee_id', $employee_id) -> first();

        $pdf = PDF::loadview('hrweb.employee.employee_details_pdf', $data);
        $pdf -> setProtection(['copy', 'print'], '', 'pass');

        return $pdf -> stream('document.pdf');
    }

    public function DeleteEmployee($employee_id){
        $data = DB::table('users')
                    ->leftJoin('assign_employees','users.id', '=','assign_employees.employee_id')
                    ->leftJoin('employee_salary_logs','users.id', '=','employee_salary_logs.employee_id')
                    ->leftJoin('employee_leaves','users.id', '=','employee_leaves.employee_id')
                    ->leftJoin('employee_attendances','users.id', '=','employee_attendances.employee_id')
                    ->where('users.id', $employee_id); 
        DB::table('assign_employees')->where('employee_id', $employee_id)->delete(); 
        DB::table('employee_salary_logs')->where('employee_id', $employee_id)->delete(); 
        DB::table('employee_leaves')->where('employee_id', $employee_id)->delete(); 
        DB::table('employee_attendances')->where('employee_id', $employee_id)->delete();      

        $data->delete();

            $notification = array(
            'message' => 'Employee Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect()->route('employee.registration.view')->with('success', 'Data Deleted');
    }
}
