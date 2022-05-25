<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\User;
use App\Mail\SendUser;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Logout(){
        Auth::logout();
        return Redirect() -> route('login');
    }

    public function ViewUsers(){
        $allUser = User::where('role','=','Admin')
        ->orWhere('role','=','HR') -> get();
        
        return view('adminweb.viewUser', compact('allUser'));
    }

    public function AddUsers(){
        return view('adminweb.addUser');
    }

    public function StoreUsers(Request $request){
        $validateUser = $request -> validate([
            'name' => 'required|unique:users',
            'role' => 'required',
            'email' => 'required|unique:users',
        ]);

        $data = new User();
        $code = rand(000000,999999);
        $data -> name = $request -> name;
        $data -> role = $request -> role;
        $data -> email = $request -> email;
        $data -> password = bcrypt($code);
        $data -> code = $code;

        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/employee_images'),$filename);
            $data['image'] = $filename;
        }
        $data -> save();

        Mail::to($data -> email)->send(new SendUser($data));

        $notification = array(
            'message' => 'User Added Successfully',
            'alert-type' => 'success',
        );

        return redirect() -> route('users.view') -> with($notification);
    }

    public function EditUsers($id){
        $editUsers = User::find($id);
        return view('adminweb.editUser', compact('editUsers'));

    }

    public function UpdateUsers(Request $request, $id){
        $data = User::find($id);
        $data -> name = $request -> name;
        $data -> role = $request -> role;
        $data -> email = $request -> email;
        $data -> save();

        $notification = array(
            'message' => 'User Updated Successfully',
            'alert-type' => 'info',
        );

        return redirect() -> route('users.view') -> with($notification);
    }

    public function DeleteUsers($id){
        $deleteUsers = User::find($id);
        $deleteUsers -> delete();

        $notification = array(
            'message' => 'Employee Deleted Successfully',
            'alert-type' => 'info',
        );

        return redirect() -> route('users.view') -> with($notification);

    }
}
