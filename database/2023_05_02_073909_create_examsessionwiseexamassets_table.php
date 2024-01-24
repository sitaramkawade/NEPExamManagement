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
        Schema::create('examsessionwiseexamassets', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('examsession_id')->unsigned();
            $table->foreign('examsession_id')->references('id')->on('examsessions');

            $table->bigInteger('examassetmaster_id')->unsigned();
            $table->foreign('examassetmaster_id')->references('id')->on('examassetmasters');           
           
            $table->integer('totalused');
          
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->tinyInteger('status')->default(0);
            $table->date('examdate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examsessionwiseexamassets');
    }
};
