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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('mobile_no',20)->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
           $table->tinyInteger('active')->default(1);
            $table->timestamp('last_login')->nullable();
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
