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
        Schema::create('studentprofiles', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
                $table->string('name_devnagari', 200)->nullable();
                $table->string('father_name',100)->nullable();
                $table->string('father_name_devnagari',200)->nullable();
                
                $table->string('mother_name_devnagari',200)->nullable();
                $table->string('gender',5)->nullable();
                $table->string('dob',30)->nullable();
                $table->string('nationality',100)->nullable();
                $table->string('adharno',200)->nullable();
                $table->string('domicile',100)->nullable();
                $table->string('caste',100)->nullable();
                $table->string('category',100)->nullable();
                $table->tinyInteger('is_noncreamylayer')->default(0); 
                $table->tinyInteger('is_minority')->default(0); 
                $table->tinyInteger('is_handicap')->default(0); 
                $table->string('migratestud',100)->nullable();
                $table->text('profile_photo_path')->nullable();
                $table->text('sign_photo_path')->nullable();
                $table->bigInteger('student_id')->unsigned()->unique();
                $table->foreign('student_id')->references('id')->on('students');
                $table->tinyInteger('profile_complete_status')->default(0);  //if 0 =>profile is uncompleted ,1 means not completed
                $table->timestamps();
                
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('studentprofiles');
    }
};
