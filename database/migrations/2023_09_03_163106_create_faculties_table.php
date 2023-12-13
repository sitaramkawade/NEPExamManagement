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
        Schema::create('faculties', function (Blueprint $table) {
            $table->id();
            $table->string('faculty_name');
            $table->string('email')->unique();
            $table->string('mobile_no',20);
            $table->date('date_of_birth'); // date of birth
            $table->tinyInteger('gender'); // '1-male' '2-female' '3-other'
            $table->string('category'); // category
            $table->text('pan',10)->unique(); // pan
            $table->text('current_address'); // current-address
            $table->text('permanant_address'); // permanant-address
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->text('profile_photo_path')->nullable();
            $table->string('unipune_id',100)->nullable()->default(null);
            $table->string('qualification',100)->nullable()->default(null);
            $table->bigInteger('role_id')->before('created_at')->nullable()->unsigned()->default(null);
            $table->foreign('role_id')->references('id')->on('roles');

            $table->bigInteger('department_id')->nullable()->unsigned()->default(null);
            $table->foreign('department_id')->references('id')->on('departments');

            $table->bigInteger('college_id')->nullable()->unsigned()->default(null);
            $table->foreign('college_id')->references('id')->on('colleges');
            $table->tinyInteger('active')->default(1);//1 =>active ,0=>inactive
            $table->timestamp('last_login')->nullable();
            $table->tinyInteger('faculty_verified')->default('0');  //0 means not verified

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculties');
    }
};
