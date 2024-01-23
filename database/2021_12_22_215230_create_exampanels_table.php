<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExampanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exampanels', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('faculty_id')->unsigned();
            $table->foreign('faculty_id')->references('id')->on('faculties');

            $table->bigInteger('examorderpost_id')->unsigned();
            $table->foreign('examorderpost_id')->references('id')->on('examorderposts');
         
            $table->bigInteger('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects');

            $table->string('description',50)->nullable();
            
            $table->tinyInteger('active_status')->default('1');  //0 means not active
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exampanels');
    }
}
