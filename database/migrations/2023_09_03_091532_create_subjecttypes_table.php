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
        Schema::create('subjecttypes', function (Blueprint $table) {
            $table->id();
            $table->string('type_name',30);//Theory Practical
            $table->string('type_shortname',10);//Th Pr Prj Ojt
            $table->tinyInteger('active')->default('0');// 0 :not active 1:active

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subjecttypes');
    }
};
