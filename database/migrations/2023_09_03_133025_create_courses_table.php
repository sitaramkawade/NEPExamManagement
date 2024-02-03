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
            $table->string('special_subject',100)->nullable()->comment('Major Subject');//Major Subject
            $table->string('course_type',20)->default(NULL)->comment('UG or PG'); //UG or PG
            $table->bigInteger('college_id')->nullable()->unsigned()->default(null);
            $table->bigInteger('programme_id')->nullable()->unsigned()->default(null);
            $table->bigInteger('course_category_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('course_category_id')->references('id')->on('coursecategories')->onDelete('cascade');
            $table->foreign('programme_id')->references('id')->on('programmes')->onDelete('cascade');
            $table->foreign('college_id')->references('id')->on('colleges')->onDelete('cascade');
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
