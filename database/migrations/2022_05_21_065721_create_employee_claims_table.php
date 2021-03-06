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
        Schema::create('employee_claims', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id') -> comment('employee_id = user_id');
            $table->integer('claim_purpose_id');
            $table->date('claim_date');
            $table->integer('claim_amount');
            $table->string('status') -> default('Pending');
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
        Schema::dropIfExists('employee_claims');
    }
};
