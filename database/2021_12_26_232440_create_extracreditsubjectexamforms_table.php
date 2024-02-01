<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtracreditsubjectexamformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('extracreditsubjectexamforms', function (Blueprint $table) {
    //         $table->id();
    //         $table->string('prn',100);

    //         //All field denotes student chosen the int ext practical project for that subject 
         
    //        $table->tinyInteger('select_status')->default('0'); 
             
    //        $table->bigInteger('exam_id')->unsigned();
    //        $table->foreign('exam_id')->references('id')->on('exams');
           
    //        $table->bigInteger('student_id')->unsigned();
    //        $table->foreign('student_id')->references('id')->on('students');
         
    //        $table->bigInteger('subject_id')->unsigned();
    //        $table->foreign('subject_id')->references('id')->on('extracreditsubjects');
    //        $table->bigInteger('examformmaster_id')->nullable()->unsigned();
    //        $table->foreign('examformmaster_id')->references('id')->on('examformmasters');
          

    //         $table->timestamps();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  *
    //  * @return void
    //  */
    // public function down()
    // {
    //     Schema::dropIfExists('extracreditsubjectexamforms');
    // }
}
