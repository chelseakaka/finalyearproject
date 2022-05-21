<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeShift;


class EmployeeShiftController extends Controller
{
    public function ViewShift(){
        $data['allData'] = EmployeeShift::all();
        return view('hrweb.setup_shifts.view_shift', $data);
    }

    public function AddShift(){
        return view('hrweb.setup_shifts.add_shift');
    }

    public function StoreShift(Request $request){
        $validateData = $request -> validate([
            'name' => 'required|unique:employee_shifts,name',
        ]);

        $data = new EmployeeShift();
        $data -> name = $request -> name;
        $data -> save();

        $notification = array(
            'message' => 'Shift Added Successfully',
            'alert-type' => 'success',
        );

        return redirect() -> route ('employee.shift.view') -> with($notification);
    }

    public function EditShift($id){
        $editData = EmployeeShift::find($id);
        
        return view('hrweb.setup_shifts.edit_shift', compact('editData'));
    }

    public function UpdateShift(Request $request,$id){
        $data = EmployeeShift::find($id);

        $validateData = $request -> validate([
            'name' => 'required|unique:employee_shifts,name,'.$data -> id
        ]);

        $data -> name = $request -> name;
        $data -> save();

        $notification = array(
            'message' => 'Shift Updated Successfully',
            'alert-type' => 'success',
        );

        return redirect() -> route ('employee.shift.view') -> with($notification);
    }

    public function DeleteShift($id){
        $shift = EmployeeShift::find($id);
        $shift -> delete();

        $notification = array(
            'message' => 'Shift Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect() -> route ('employee.shift.view') -> with($notification);
    }
}
