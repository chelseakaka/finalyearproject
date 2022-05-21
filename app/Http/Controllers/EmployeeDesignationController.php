<?php

namespace App\Http\Controllers;
use App\Models\EmployeeDesignation;

use Illuminate\Http\Request;

class EmployeeDesignationController extends Controller
{
    public function ViewDesignation(){
        $data['allData'] = EmployeeDesignation::all();
        return view('hrweb.setup_designations.view_designation', $data);
    }

    public function AddDesignation(){
        return view('hrweb.setup_designations.add_designation');
    }

    public function StoreDesignation(Request $request){
        $validateData = $request -> validate([
            'name' => 'required|unique:employee_designations,name',
        ]);

        $data = new EmployeeDesignation();
        $data -> name = $request -> name;
        $data -> save();

        $notification = array(
            'message' => 'Designation Added Successfully',
            'alert-type' => 'success',
        );

        return redirect() -> route ('employee.designation.view') -> with($notification);
    }

    public function EditDesignation($id){
        $editData = EmployeeDesignation::find($id);
        
        return view('hrweb.setup_designations.edit_designation', compact('editData'));
    }

    public function UpdateDesignation(Request $request,$id){
        $data = EmployeeDesignation::find($id);

        $validateData = $request -> validate([
            'name' => 'required|unique:employee_designations,name,'.$data -> id
        ]);

        $data -> name = $request -> name;
        $data -> save();

        $notification = array(
            'message' => 'Designation Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect() -> route ('employee.designation.view') -> with($notification);
    }

    public function DeleteDesignation($id){
        $designation = EmployeeDesignation::find($id);
        $designation -> delete();

        $notification = array(
            'message' => 'Designation Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect() -> route ('employee.designation.view') -> with($notification);
    }
}
