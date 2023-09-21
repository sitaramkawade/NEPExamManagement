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
        Schema::create('subjectcategories', function (Blueprint $table) {
            $table->id();
            $table->string('subjectcategory')->nullable();//Major Minor
            $table->string('subjectcategory_shortname',10)->nullable();
             $table->tinyInteger('active')->default('0');// 0 :not active 1:active
         
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjectcategories');
    }
};