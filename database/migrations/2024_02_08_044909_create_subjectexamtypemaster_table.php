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
        Schema::create('subjectexamtypemaster', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('subjecttype_id')->nullable()->unsigned()->default(null);
            $table->foreign('subjecttype_id')->references('id')->on('subjecttypes');
            $table->bigInteger('examtype_id')->nullable()->unsigned()->default(null);
            $table->foreign('examtype_id')->references('id')->on('subjectexamtypes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjectexamtypemaster');
    }
};
