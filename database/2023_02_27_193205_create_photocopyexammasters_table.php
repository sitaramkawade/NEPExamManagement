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
        Schema::create('photocopyexammasters', function (Blueprint $table) {
            $table->id();
           
            $table->bigInteger('student_id')->unsigned();
            $table->foreign('student_id')->references('id')->on('students');

            $table->bigInteger('patternclass_id')->unsigned();
            $table->foreign('patternclass_id')->references('id')->on('pattern_classes');

            $table->bigInteger('exam_id')->unsigned();
            $table->foreign('exam_id')->references('id')->on('exams');
 
          //0 not inwarded ,1 photocopy inwarded,2 reval inwarded
            $table->integer('inwardstatus')->default(0);

            $table->date('photocopyinwarddate')->nullable();
            $table->date('revalinwarddate')->nullable();
            
            $table->integer('feepaidstatus')->default(0);
            $table->integer('printstatus')->default(0);

            $table->float('photocopyformfee',8,2)->default(0);
            $table->float('photocopypersubjectrate',8,2)->default(0);
            $table->integer('photocopytotalfee');

            $table->float('revalformfee',8,2)->default(0);
            $table->float('revalpersubjectrate',8,2)->default(0);
            $table->integer('revaltotalfee');
            
         
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photocopyexammasters');
    }
};
