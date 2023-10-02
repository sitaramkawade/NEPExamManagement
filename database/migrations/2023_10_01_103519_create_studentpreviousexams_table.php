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
        Schema::create('studentpreviousexams', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('educationalcourse_id')->nullable()->unsigned()->default(null);
            $table->foreign('educationalcourse_id')->references('id')->on('educationalcourses');
           
            $table->date('passing_year');
            $table->integer('seat_number');
            $table->integer('obtained_marks');
            $table->integer('total_marks');
            $table->float('percentage',5,2);
            $table->float('cgpa',5,2);
            $table->string("grade",3);
            $table->bigInteger('student_id')->unsigned()->nullable();
            $table->foreign('student_id')->references('id')->on('students');
            $table->bigInteger('boarduniversity_id')->nullable()->unsigned()->default(null);
            $table->foreign('boarduniversity_id')->references('id')->on('boarduniversities');
            $table->timestamps();
            $table->unique(['student_id', 'educationalcourse_id']); //  [ 'column1', 'column2']
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentpreviousexams');
    }
};
