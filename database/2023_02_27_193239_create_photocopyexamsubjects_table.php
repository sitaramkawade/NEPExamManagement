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
        Schema::create('photocopyexamsubjects', function (Blueprint $table) {
            $table->id();
           
            $table->bigInteger('photocopyexammaster_id')->unsigned();
            $table->foreign('photocopyexammaster_id')->references('id')->on('photocopyexammasters');
           
            $table->bigInteger('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects');
            
            $table->bigInteger('studentmark_id')->unsigned();
            $table->foreign('studentmark_id')->references('id')->on('studentmarks');
            
            $table->integer('revalmarks')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('photocopyexamsubjects');
    }
};
