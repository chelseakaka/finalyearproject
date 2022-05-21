<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_employees', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->comment('user_id = employee_id');
            $table->integer('department_id')->nullable();
            $table->integer('designation_id')->nullable();
            $table->integer('shift_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assign_employees');
    }
};
