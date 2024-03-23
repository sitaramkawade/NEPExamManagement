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
        Schema::create('questionpaperbanks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('papersubmission_id')->unsigned();
            $table->foreign('papersubmission_id')->references('id')->on('papersubmissions');
            $table->bigInteger('exam_id')->unsigned();
            $table->foreign('exam_id')->references('id')->on('exams');//Used
            $table->string('file_path')->nullable();
            $table->string('file_name')->nullable();
            $table->bigInteger('set_id')->unsigned()->nullable();//Custodian
            $table->foreign('set_id')->references('id')->on('papersets');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('faculty_id')->unsigned()->nullable();//Custodian
            $table->foreign('faculty_id')->references('id')->on('faculties');
            $table->tinyInteger('is_used')->default(1); //If 1 means available
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questionpaperbanks');
    }
};
