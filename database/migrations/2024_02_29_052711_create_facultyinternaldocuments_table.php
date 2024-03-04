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
        Schema::create('facultyinternaldocuments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('faculty_id')->unsigned()->nullable();
            $table->foreign('faculty_id')->references('id')->on('faculties');
            $table->string('document_fileName', 255)->nullable();
            $table->string('document_fileTitle', 255)->nullable();
            $table->bigInteger('internaltooldocument_id')->unsigned();
            $table->foreign('internaltooldocument_id')->references('id')->on('internaltoolmasters');
            $table->bigInteger('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects');
            $table->bigInteger('academicyear_id')->unsigned();
            $table->foreign('academicyear_id')->references('id')->on('academicyears');
            $table->bigInteger('verifybyfaculty_id')->unsigned()->nullable();
            $table->foreign('verifybyfaculty_id')->references('id')->on('faculties');
            $table->string('verificationremark', 255)->nullable();
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facultyinternaldocuments');
    }
};