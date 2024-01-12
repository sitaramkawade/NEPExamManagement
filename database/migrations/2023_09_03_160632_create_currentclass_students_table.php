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
        Schema::create('currentclass_students', function (Blueprint $table) {
            $table->id();
            $table->string('prn',100);
                    
            $table->integer('sem'); 
            $table->integer('pfstatus')->default(-1);//pass=1 fail=0 ATKT=2 status 
            $table->integer('isregular')->nullable()->default(null); //isregular Default NULL 0 => repeater 1=>regular
            $table->integer('is_directadmission')->default(0);//0 Means Print origal 1 Dublicate 
            $table->unsignedBigInteger('patternclass_id');
            $table->unsignedBigInteger('student_id');
            $table->unique(['student_id','sem','patternclass_id']);
            $table->unsignedBigInteger('college_id')->nullable()->default(null);
            $table->unsignedBigInteger('academicyear_id');  //Major Minor
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('patternclass_id')->references('id')->on('pattern_classes');
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('college_id')->references('id')->on('colleges');
            $table->foreign('academicyear_id')->references('id')->on('academicyears');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currentclass_students');
    }
};
