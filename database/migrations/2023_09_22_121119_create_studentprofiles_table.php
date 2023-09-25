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
            // $table->charset = 'utf8mb4';
            // $table->collation = 'utf8mb4_unicode_ci';
            $table->id();
            $table->string('student_name_devnagari', 200)->nullable()->default(null)->collation('utf8mb4_general_ci')->charset('utf8mb4');
            $table->string('mother_name_devnagari',200)->nullable()->default(null)->collation('utf8mb4_general_ci')->charset('utf8mb4');
            $table->string('father_name',100)->nullable();
            $table->string('father_name_devnagari',200)->nullable()->collation('utf8mb4_general_ci')->charset('utf8mb4');   
            $table->string('parent_name',100)->nullable();  //gardian
            $table->string('parent_mobile_no',20)->nullable()->default(null);      
            $table->string('title',5)->nullable();
            $table->string('gender',1)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('nationality',50)->nullable();               
            $table->string('domicile',100)->nullable();
            $table->bigInteger('caste_id')->unsigned()->nullable()->default(null);
            $table->foreign('caste_id')->references('id')->on('castes');
            $table->bigInteger('caste_category_id')->unsigned()->nullable()->default(null);
            $table->foreign('caste_category_id')->references('id')->on('caste_categories');
            $table->tinyInteger('is_noncreamylayer')->default(0); 
            $table->tinyInteger('is_minority')->default(0); 
            $table->tinyInteger('is_handicap')->default(0); 
            $table->bigInteger('maritalstatus_id')->unsigned()->nullable()->default(null);
            $table->foreign('maritalstatus_id')->references('id')->on('maritalstatuses');
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
