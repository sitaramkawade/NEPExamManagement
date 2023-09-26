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
        $table->string('address',100)->nullable();
        $table->string('pincode', 200)->nullable();
        $table->string('district',200)->nullable();
        $table->string('state',100)->nullable();
        $table->string('taluka',200)->nullable();
        $table->string('village_name',50)->nullable();
        $table->string('locality_name',200)->nullable();
        $table->string('c_address',100)->nullable();
        $table->string('c_pincode',200)->nullable();
        $table->string('c_district',100)->nullable();
        $table->string('c_state',100)->nullable();
        $table->string('c_taluka',100)->nullable();
        $table->string('c_village_name')->nullable();
        $table->string('c_locality_name')->nullable();
       
        $table->bigInteger('student_id')->unsigned()->unique();
        $table->foreign('student_id')->references('id')->on('students');
      
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentaddresses');
    }
};
