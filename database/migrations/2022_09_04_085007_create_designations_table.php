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
        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->string('designation',50);
            $table->bigInteger('roletype_id')->nullable()->unsigned()->default(null);
            $table->foreign('roletype_id')->references('id')->on('roletypes')->onUpdate('cascade')->onDelete('cascade');
            $table->tinyInteger('is_active')->default(1); //1 =>active ,0=>not active
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('designations');
    }
};
