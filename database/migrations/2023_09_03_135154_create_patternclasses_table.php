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
        Schema::create('pattern_classes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('class_id')->unsigned();
            $table->foreign('class_id')->references('id')->on('course_classes');
            $table->bigInteger('pattern_id')->unsigned();           
            $table->foreign('pattern_id')->references('id')->on('patterns');          
            $table->tinyInteger('status')->default('1');//Future use
            $table->Integer('sem1_total_marks')->default(0);
            $table->Integer('sem2_total_marks')->default(0);
            $table->Integer('sem1_credits')->default(0);
            $table->Integer('sem2_credits')->default(0);
            $table->Integer('totalnosubjects')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pattern_classes');
    }
};
