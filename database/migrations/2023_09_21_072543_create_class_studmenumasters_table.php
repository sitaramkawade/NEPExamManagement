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
            $table->bigInteger('studmenumaster_id')->unsigned()->nullable();
            $table->foreign('studmenumaster_id')->references('id')->on('studmenumasters')->onDelete('cascade');
           
            $table->bigInteger('patternclass_id')->unsigned()->nullable();
            $table->foreign('patternclass_id')->references('id')->on('pattern_classes')->onDelete('cascade');
           
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('college_id')->nullable()->unsigned()->default(null);
            $table->foreign('college_id')->references('id')->on('colleges')->onDelete('cascade');
            $table->tinyInteger('isactive')->default('1');
            $table->unique(['studmenumaster_id', 'patternclass_id','college_id'],'classwisemenu'); //  [ 'column1', 'column2']
          
            $table->timestamps();
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
