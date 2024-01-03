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
        Schema::create('colleges', function (Blueprint $table) {
            $table->id();
            $table->string('college_name')->nullable();
            $table->string('college_address')->default(null)->nullable();
            $table->string('college_website_url',100)->default(null)->nullable();
            $table->string('college_email',100)->default(null)->nullable();
            $table->string('college_contact_no',50)->default(null)->nullable();
            $table->text('college_logo_path')->nullable();
            $table->bigInteger('sanstha_id')->nullable()->unsigned()->default(null);
            $table->foreign('sanstha_id')->references('id')->on('sansthas');
            
            $table->bigInteger('university_id')->nullable()->unsigned()->default(null);
            $table->foreign('university_id')->references('id')->on('universities');
            
            $table->tinyInteger('status')->default('0');// 0 :not active 1:active
            $table->tinyInteger('is_default')->default('0');// 0 :not active 1:active
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colleges');
    }
};
