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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('id_no')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phonenumber')->nullable();
            $table->string('address')->nullable();
            $table->string('gender')->nullable();
            $table->string('image')->nullable();
            $table->DATE('dob')->nullable();
            $table->string('religion')->nullable();
            $table->string('nationality')->nullable();
            $table->double('salary')->nullable();
            $table->string('bankaccount')->nullable();
            $table->string('maritalstatus')->nullable();
            $table->string('code')->nullable();
            $table->string('role')->nullable();
            $table->DATE('joineddate')->nullable();
            $table->string('reportingto')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
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
        Schema::dropIfExists('employees');
    }
};
