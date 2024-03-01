<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentmarks', function (Blueprint $table) {
            $table->id();
            // $table->string('prn',100);
            $table->integer('seatno');
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');
            $table->bigInteger('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->tinyInteger('sem');
            $table->Integer('int_marks'); 
            $table->Integer('int_practical_marks'); // if subject having option  int_Marks+int_Practical_Marks

            $table->Integer('ext_marks');  //Practical or Theory 
            $table->integer('ext_practical_marks');    //if subject having  option Practical + Theory
            $table->Integer('practical_marks');     //Only Practical
           
            $table->Integer('project_marks'); //Only Project
            $table->string('oral'); //Only Oral 
            $table->string('subject_grade',5)->nullable();
            $table->string('grade');  //Only Grade

            
            $table->Integer('grade_point')->default(0);
            $table->Integer('gpa')->default(0);
            $table->Integer('total')->default(0);

            $table->tinyInteger('int_ordinace_flag')->default('0');  //Ordinace one flag defalt is 0 / 1 means ordinace one is applied to that subject
            $table->Integer('int_ordinance_one_marks')->default('0'); 
            $table->tinyInteger('ext_ordinace_flag')->default('0');  //Ordinace one flag defalt is 0 / 1 means ordinace one is applied to that subject
            $table->Integer('ext_ordinance_one_marks')->default('0'); 
            $table->tinyInteger('practical_ordinace_flag')->default('0');  //Ordinace one flag defalt is 0 / 1 means ordinace one is applied to that subject
            $table->Integer('practical_ordinance_one_marks')->default('0'); 
            $table->tinyInteger('total_ordinace_flag')->default('0');  //Ordinace one flag defalt is 0 / 1 means ordinace one is applied to that subject
            $table->Integer('total_ordinance_one_marks')->default('0'); 
            $table->Integer('total_ordinancefour_marks')->default('0'); 
            
            $table->bigInteger('exam_id')->unsigned();
            $table->foreign('exam_id')->references('id')->on('exams');
            $table->bigInteger('patternclass_id')->unsigned();
            $table->foreign('patternclass_id')->references('id')->on('pattern_classes');
            $table->tinyInteger('performancecancel')->default('0'); 
            $table->unique(['student_id','subject_id','seatno','exam_id']);
            
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
        Schema::dropIfExists('studentmarks');
    }
}
