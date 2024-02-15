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
            $table->integer('totalfee')->default(0);
            $table->integer('inwardstatus')->default(0);
            $table->timestamp('inwarddate')->nullable();
            $table->integer('feepaidstatus')->default(0);
            $table->integer('printstatus')->default(0);
            $table->tinyInteger('hallticketstatus')->default(0);
            $table->bigInteger('student_id')->unsigned();
            $table->bigInteger('transaction_id')->nullable()->unsigned();
            $table->bigInteger('college_id')->nullable()->unsigned();
            $table->bigInteger('exam_id')->unsigned();
            $table->bigInteger('patternclass_id')->unsigned();
            $table->string('medium_instruction',100);
            $table->timestamp('verified_at')->nullable();
            $table->timestamps();
            $table->foreign('transaction_id')->references('id')->on('transactions');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('college_id')->references('id')->on('colleges');
            $table->foreign('exam_id')->references('id')->on('exams');
            $table->foreign('patternclass_id')->references('id')->on('pattern_classes');
            $table->unique(['student_id', 'exam_id', 'patternclass_id']);
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
