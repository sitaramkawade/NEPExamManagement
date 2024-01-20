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
        Schema::create('facultybankaccounts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('faculty_id')->unsigned();
            $table->foreign('faculty_id')->references('id')->on('faculties')->onDelete('cascade');


            $table->string('account_no',50)->nullable();
            // $table->string('bank_address',50)->nullable();
            $table->string('bank_address')->nullable(); //length modified
            $table->string('bank_name',50)->nullable();
            $table->string('branch_name',50)->nullable();
            $table->string('branch_code',50)->nullable();
            $table->string('account_type',1)->nullable();//S =>Saving account, C =>Current account
            $table->string('ifsc_code',50)->nullable();
            $table->string('micr_code',50)->nullable();

            $table->tinyInteger('acc_verified')->default('0');  //0 means not verified
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facultybankaccounts');
    }
};
