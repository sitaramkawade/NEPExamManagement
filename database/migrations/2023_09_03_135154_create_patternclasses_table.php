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
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('pattern_id');
            $table->tinyInteger('status')->default('1');//Future use
            $table->Integer('sem1_total_marks')->default(0);
            $table->Integer('sem2_total_marks')->default(0);
            $table->Integer('sem1_credits')->default(0);
            $table->Integer('sem2_credits')->default(0);
            $table->Integer('sem1_totalnosubjects')->nullable()->default(0);
            $table->Integer('sem2_totalnosubjects')->nullable()->default(0);
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('class_id')->references('id')->on('course_classes')->onDelete('cascade');
            $table->foreign('pattern_id')->references('id')->on('patterns')->onDelete('cascade');
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
