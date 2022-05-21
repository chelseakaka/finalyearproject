<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignEmployee extends Model
{
    use HasFactory;

    public function Employee(){
        return $this -> belongsTo(User::class, 'employee_id', 'id');
    }

    public function Employee_department(){
        return $this -> belongsTo(EmployeeDepartment::class, 'department_id', 'id');
    }

    public function Employee_designation(){
        return $this -> belongsTo(EmployeeDesignation::class, 'designation_id', 'id');
    }

    public function Employee_shift(){
        return $this -> belongsTo(EmployeeShift::class, 'shift_id', 'id');
    }
}
