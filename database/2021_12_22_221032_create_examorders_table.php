<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examorders', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('exampanel_id')->unsigned();
            $table->foreign('exampanel_id')->references('id')->on('exampanels');
          
            $table->bigInteger('exam_patternclass_id')->unsigned();
            $table->foreign('exam_patternclass_id')->references('id')->on('exam_patternclasses');
                  
            $table->string('description',50)->nullable();
            $table->tinyInteger('email_status')->default('0');  //0 means not sent
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
        Schema::dropIfExists('examorders');
    }
}
