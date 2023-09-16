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
        Schema::create('examformmasters', function (Blueprint $table) {
            $table->id();
            $table->integer('totalfee');
            $table->integer('inwardstatus')->default(0);
            $table->timestamp('inwarddate')->nullable();
            $table->integer('feepaidstatus')->default(0);
            $table->integer('printstatus')->default(0);

            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');

            $table->bigInteger('patternclass_id')->unsigned();
            $table->foreign('patternclass_id')->references('id')->on('pattern_classes');

            $table->bigInteger('exam_id')->unsigned();
            $table->foreign('exam_id')->references('id')->on('exams');
            $table->bigInteger('college_id')->nullable()->unsigned()->default(null);
            $table->foreign('college_id')->references('id')->on('colleges');
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examformmasters');
    }
};
