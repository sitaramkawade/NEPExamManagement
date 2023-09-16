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
        Schema::table('subjects', function (Blueprint $table) {
            $table->bigInteger('patternclass_id')->after('subject_optionalgroup')->nullable()->unsigned();
            $table->foreign('patternclass_id')->references('id')->on('pattern_classes');
            $table->bigInteger('college_id')->after('patternclass_id')->nullable()->unsigned()->default(null);
            $table->foreign('college_id')->references('id')->on('colleges');
         
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign(['patternclass_id']);
            $table->dropColumn('patternclass_id');
            $table->dropForeign(['college_id']);
            $table->dropColumn('college_id');
        });
    }
};
