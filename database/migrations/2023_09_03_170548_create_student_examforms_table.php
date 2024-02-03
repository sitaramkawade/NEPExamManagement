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
        Schema::create('student_examforms', function (Blueprint $table) {
            $table->id();

            //All field denotes student chosen the int ext practical project for that subject 
         
           $table->tinyInteger('int_status')->default('0'); 
             $table->tinyInteger('int_practical_status')->default('0'); //University Practical Theory 
             $table->tinyInteger('ext_status')->default('0'); //Theory or Practical including practical
        

           $table->tinyInteger('grade_status')->default('0'); 
           $table->tinyInteger('practical_status')->default('0'); //future use only practical External subject only
          
           $table->tinyInteger('project_status')->default('0');   
           $table->tinyInteger('oral_status')->default('0'); 

           $table->bigInteger('exam_id')->unsigned();
           $table->foreign('exam_id')->references('id')->on('exams')->onDelete('cascade');
           
           $table->bigInteger('student_id')->unsigned();
           $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
         
           $table->bigInteger('subject_id')->unsigned();
           $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
           $table->bigInteger('examformmaster_id')->nullable()->unsigned();
           $table->foreign('examformmaster_id')->references('id')->on('examformmasters')->onDelete('cascade');
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
        Schema::dropIfExists('student_examforms');
    }
};
