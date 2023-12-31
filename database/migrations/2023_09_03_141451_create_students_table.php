<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('prn',100)->nullable();
            $table->bigInteger('memid')->nullable()->unsigned();
            $table->string('eligibilityno',50)->nullable();
            $table->string('abcid',50)->nullable();
            $table->string('aadhar_card_no',50)->nullable();
            $table->string('student_name');          
            $table->string('mother_name')->nullable()->default(null);          
            $table->string('mobile_no',20)->nullable()->default(null);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('email_verified')->default(0); 
            $table->timestamp('mobile_no_verified_at')->nullable();
            $table->integer('mobile_no_verified')->default(0);
            $table->string('password');
            $table->timestamp('last_login')->nullable();
            $table->bigInteger('patternclass_id')->nullable()->unsigned()->default(null);
            $table->foreign('patternclass_id')->references('id')->on('pattern_classes');//Entry on which class
            $table->bigInteger('department_id')->nullable()->unsigned()->default(null);
            $table->foreign('department_id')->references('id')->on('departments');
            $table->bigInteger('college_id')->nullable()->unsigned()->default(null);
            $table->foreign('college_id')->references('id')->on('colleges');
           
            $table->tinyInteger('status')->default(0);   //Approved Student only 0 not Approved and 1 is used to approve 
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
