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
            $table->bigInteger('classyear_id')->nullable()->unsigned()->default(null);;
            $table->foreign('classyear_id')->references('id')->on('classyears')->onDelete('cascade');
         
            $table->bigInteger('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade')->onDelete('cascade');
        
            $table->unsignedBigInteger('nextyearclass_id')->nullable()
           ->onDelete('cascade');
           
            $table->foreign('nextyearclass_id')
                  ->references('id')->on('course_classes')->onDelete('cascade');
            $table->bigInteger('college_id')->nullable()->unsigned()->default(null);
            $table->foreign('college_id')->references('id')->on('colleges')->onDelete('cascade');
          
            $table->timestamps();
            
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
