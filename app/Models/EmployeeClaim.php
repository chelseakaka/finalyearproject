<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeClaim extends Model
{
    use HasFactory;

    public function user(){
        return $this -> belongsTo(User::class, 'employee_id', 'id');
    }

    public function purpose(){
        return $this -> belongsTo(ClaimPurpose::class, 'claim_purpose_id', 'id');
    }
}
