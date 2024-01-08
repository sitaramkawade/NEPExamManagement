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
    {// offered by the department
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->integer('subject_sem')->default(0);   //1
            $table->bigInteger('subjectcategory_id')->unsigned();  //Major Minor for which department
            $table->foreign('subjectcategory_id')->references('id')->on('subjectcategories');
            $table->integer('subject_no')->default(0);  //for sorting
            $table->string('subject_code',50)->default(NULL); //3
            $table->string('subject_shortname',20)->default(NULL); //2
            $table->string('subject_name',100)->default(NULL); //2

            $table->bigInteger('subjecttype_id')->unsigned();  //Theory Practical
            $table->foreign('subjecttype_id')->references('id')->on('subjecttypes');
            $table->string('subjectexam_type',50)->default(NULL); //6  IE  - InternalExternal  IEP- Internal External Practical  IP-Internal Practical
             $table->float('subject_credit',4,1)->default(0); //7

             $table->integer('subject_maxmarks')->default(0);  //8
            $table->integer('subject_maxmarks_int')->default(0);//10
            $table->integer('subject_maxmarks_intpract')->default(0);
            $table->integer('subject_maxmarks_ext')->default(0);//9

            $table->integer('subject_totalpassing')->default(0); //11
            $table->integer('subject_intpassing')->default(0);//13
            $table->Integer('subject_intpractpassing')->default(0);
            $table->integer('subject_extpassing')->default(0);//12

            $table->char('subject_optionalgroup',3)->nullable(); //6
            $table->bigInteger('patternclass_id')->nullable()->unsigned()->default(null);;
            $table->foreign('patternclass_id')->references('id')->on('pattern_classes');
            $table->bigInteger('classyear_id')->nullable()->unsigned()->default(null);;
            $table->foreign('classyear_id')->references('id')->on('classyears');


            $table->bigInteger('department_id')->unsigned();  //Major Minor
            $table->foreign('department_id')->references('id')->on('departments');//subject belongs to department
            $table->bigInteger('college_id')->nullable()->unsigned()->default(null);
            $table->foreign('college_id')->references('id')->on('colleges');
            $table->tinyInteger('status')->default(1);//1 =>subject in use ,0=>not in use

            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjects');
    }
};
