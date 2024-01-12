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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
          $table->string('course_name',100)->default(NULL);
           
          $table->string('course_code', 50)->default(NULL);
          $table->string('fullname',100)->default(NULL);
            $table->string('shortname',100)->default(NULL);
            $table->string('special_subject',100)->comment('Major Subject');//Major Subject
            $table->string('course_type',20)->default(NULL)->comment('UG or PG'); //UG or PG
            $table->integer('course_category')->default('0')->comment('1 Professional 2: Non Professional');//1 Professional 2: Non Professional
         
            $table->bigInteger('college_id')->nullable()->unsigned()->default(null);
            $table->bigInteger('programme_id')->nullable()->unsigned()->default(null);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('college_id')->references('id')->on('colleges')->onDelete('cascade');
            $table->foreign('programme_id')->references('id')->on('programmes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
