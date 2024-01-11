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
        Schema::create('class_studmenumasters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studmenumaster_id')->nullable();
            $table->unsignedBigInteger('patternclass_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('college_id')->nullable()->default(null);
            $table->tinyInteger('isactive')->default('1');
            $table->unique(['studmenumaster_id', 'patternclass_id','college_id'],'classwisemenu'); //  [ 'column1', 'column2']
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('college_id')->references('id')->on('colleges')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('patternclass_id')->references('id')->on('pattern_classes')->onDelete('cascade');
            $table->foreign('studmenumaster_id')->references('id')->on('studmenumasters')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_studmenumasters');
    }
};
