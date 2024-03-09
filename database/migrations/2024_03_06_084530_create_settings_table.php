<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('show_abcid')->nullable()->defulat(1)->comment('0-hide,1-show_optional,2-show-required');
            $table->tinyInteger('statement_of_marks_is_year_wise')->nullable()->defulat(1)->comment('0-sem wise,1-class wise');
            $table->timestamps();
        });

        DB::table('settings')->insert([
            'show_abcid' => 1,
            'statement_of_marks_is_year_wise' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
