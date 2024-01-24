<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExambarcodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exambarcodes', function (Blueprint $table) {
            $table->id();
            // $table->integer('seatno');
            // $table->bigInteger('student_id')->unsigned();
            // $table->foreign('student_id')->references('id')->on('students');
            $table->bigInteger('exam_studentseatnos_id')->unsigned();
            $table->foreign('exam_studentseatnos_id')->references('id')->on('exam_studentseatnos');
           
            $table->bigInteger('exam_patternclasses_id')->unsigned();
            $table->foreign('exam_patternclasses_id')->references('id')->on('exam_patternclasses');
            $table->bigInteger('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->bigInteger('exam_timetable_id')->unsigned();
            $table->foreign('exam_timetable_id')->references('id')->on('exam_timetables');
           
            $table->bigInteger('lotnumber')->nullabel()->default(null);
           
            $table->Integer('status')->unsigned()->default(0);
           $table->unique(['exam_studentseatnos_id','exam_patternclasses_id','subject_id'],'exambarcodes_unique');

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
        Schema::dropIfExists('exambarcodes');
    }
}
