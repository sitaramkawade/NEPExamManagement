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
            $table->string('prefix')->nullable()->default(null); //prefix
            $table->string('faculty_name');
            $table->string('email')->unique();
            $table->string('mobile_no',20)->nullable()->default(null);
            $table->bigInteger('college_id')->nullable()->unsigned()->default(null);
            $table->bigInteger('department_id')->nullable()->unsigned()->default(null);
            $table->bigInteger('role_id')->before('created_at')->nullable()->unsigned()->default(null);

            $table->date('date_of_birth')->nullable()->default(null); // date of birth
            $table->tinyInteger('gender')->nullable()->default(null); // '1-male' '2-female' '3-other'
            $table->string('category')->nullable()->default(null); // category
            $table->text('pan',10)->unique()->nullable()->default(null); // pan
            $table->text('current_address')->nullable()->default(null); // current-address
            $table->text('permanant_address')->nullable()->default(null); // permanant-address
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->text('profile_photo_path')->nullable();
            $table->string('unipune_id',100)->nullable()->default(null);
            $table->string('qualification',100)->nullable()->default(null);


            $table->tinyInteger('active')->default(1);//1 =>active ,0=>inactive
            $table->timestamp('last_login')->nullable();
            // $table->tinyInteger('faculty_verified')->default('0');  //0 means not verified

            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');;
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('cascade')->onDelete('cascade');;
            $table->foreign('college_id')->references('id')->on('colleges')->onUpdate('cascade')->onDelete('cascade');;
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculties');
        $table->dropSoftDeletes();
    }
};
