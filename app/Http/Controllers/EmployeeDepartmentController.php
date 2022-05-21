<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeDepartment;

class EmployeeDepartmentController extends Controller
{
    public function ViewDepartment(){
        $data['allData'] = EmployeeDepartment::all();
        return view('hrweb.setup_departments.view_department', $data);
    }

    public function AddDepartment(){
        return view('hrweb.setup_departments.add_department');
    }

    public function StoreDepartment(Request $request){
        $validateData = $request -> validate([
            'name' => 'required|unique:employee_departments,name',
        ]);

        $data = new EmployeeDepartment();
        $data -> name = $request -> name;
        $data -> save();

        $notification = array(
            'message' => 'Department Added Successfully',
            'alert-type' => 'success',
        );

        return redirect() -> route ('employee.department.view') -> with($notification);
    }

    public function EditDepartment($id){
        $editData = EmployeeDepartment::find($id);
        
        return view('hrweb.setup_departments.edit_department', compact('editData'));
    }

    public function UpdateDepartment(Request $request,$id){
        $data = EmployeeDepartment::find($id);

        $validateData = $request -> validate([
            'name' => 'required|unique:employee_departments,name,'.$data -> id
        ]);

        $data -> name = $request -> name;
        $data -> save();

        $notification = array(
            'message' => 'Department Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect() -> route ('employee.department.view') -> with($notification);
    }

    public function DeleteDepartment($id){
        $department = EmployeeDepartment::find($id);
        $department -> delete();

        $notification = array(
            'message' => 'Department Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect() -> route ('employee.department.view') -> with($notification);
    }
}
