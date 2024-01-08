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
        Schema::create('student_helpline_uploaded_documents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_helpline_id')->nullable()->unsigned();
            $table->bigInteger('helpline_document_id')->nullable()->unsigned();
            $table->string('helpline_document_path')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('student_helpline_id')->references('id')->on('student_helplines');
            $table->foreign('helpline_document_id')->references('id')->on('student_helpline_documents');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_helpline_uploaded_documents');
    }
};
