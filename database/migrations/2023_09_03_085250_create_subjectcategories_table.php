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
            $table->string('subjectbucket_type',50);

            $table->tinyInteger('is_active')->default('0');// 0 :not active 1:active for departmet specific classes 2:active for all classes

            $table->timestamps();
            $table->softDeletes();
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
