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
        Schema::create('admissiondatas', function (Blueprint $table) {
            $table->id();
            $table->string('subject_code',100);
            $table->integer('memid');
            $table->string('stud_name',100);    

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          
            $table->bigInteger('patternclass_id')->unsigned();
            $table->foreign('patternclass_id')->references('id')->on('pattern_classes')->onDelete('cascade');

            $table->bigInteger('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
           $table->bigInteger('academicyear_id')->unsigned();  //Major Minor
            $table->foreign('academicyear_id')->references('id')->on('academicyears')->onDelete('cascade');
            $table->bigInteger('department_id')->unsigned();  //Major Minor
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
           
            $table->bigInteger('college_id')->nullable()->unsigned()->default(null);
            $table->foreign('college_id')->references('id')->on('colleges')->onDelete('cascade');
         
          
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admissiondatas');
    }
};
