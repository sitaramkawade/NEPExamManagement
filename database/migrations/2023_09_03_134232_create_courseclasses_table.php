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
        Schema::create('course_classes', function (Blueprint $table) {
            $table->id();      
            $table->unsignedBigInteger('classyear_id')->nullable()->default(null);;
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('nextyearclass_id')->nullable();
            $table->unsignedBigInteger('college_id')->nullable()->default(null);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->foreign('classyear_id')->references('id')->on('classyears')->onDelete('cascade');
            $table->foreign('nextyearclass_id')->references('id')->on('course_classes')->onDelete('cascade');
            $table->foreign('college_id')->references('id')->on('colleges')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_classes');
    }
};
