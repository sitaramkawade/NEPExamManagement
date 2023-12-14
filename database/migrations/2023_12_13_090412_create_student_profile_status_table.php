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
        Schema::create('student_profile_status', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id')->unsigned()->unique();
            $table->bigInteger('stud_menu_master_id')->unsigned()->unique();
            $table->tinyInteger('status')->default(0);
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('stud_menu_master_id')->references('id')->on('studmenumasters');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_profile_status');
    }
};
