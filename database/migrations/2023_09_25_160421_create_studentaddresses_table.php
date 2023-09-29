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
        Schema::create('studentaddresses', function (Blueprint $table) {
        $table->id();
        $table->string('address',100)->nullable()->default(NULL);
        $table->string('pincode', 200)->nullable()->default(NULL);
        $table->bigInteger('taluka_id')->unsigned()->nullable()->default(NULL);
        $table->foreign('taluka_id')->references('id')->on('talukas');
        $table->string('village_name',50)->nullable()->default(NULL);
        $table->string('locality_name',200)->nullable()->default(NULL);      
      
        $table->bigInteger('student_id')->unsigned()->nullable();
        $table->foreign('student_id')->references('id')->on('students');

        $table->bigInteger('addresstype_id')->unsigned()->nullable();
        $table->foreign('addresstype_id')->references('id')->on('addresstypes');    

        $table->boolean('is_competed')->default(1); //
        $table->timestamps();
        $table->unique(['student_id', 'addresstype_id']); //  [ 'column1', 'column2']
        });
    }




        /**
     * Reverse the migrations.
     * Reverse the migrations.
     * Reverse the migrations.
    * Reverse the migrations.
     * Reverse the migrations.
     * Reverse the migrations.
     * Reverse the migrations.
     * Reverse the migrations.
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentaddresses');
    }
};
