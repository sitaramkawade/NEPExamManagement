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
        Schema::create('roletypes', function (Blueprint $table) {
            $table->id();
            $table->string('roletype_name');
            // $table->boolean('status');
            $table->boolean('status')->default(1); // 1-Active 0-Inactive
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roletypes');
    }
};
