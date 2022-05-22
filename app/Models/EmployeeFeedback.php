<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeFeedback extends Model
{
    use HasFactory;

    public function Employee(){
        return $this -> belongsTo(User::class, 'employee_id', 'id');
    }
}
