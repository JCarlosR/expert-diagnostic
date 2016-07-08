<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiseaseMedicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disease_medication', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('disease_id')->unsigned();
            $table->foreign('disease_id')->references('id')->on('diseases');

            $table->integer('medication_id')->unsigned();
            $table->foreign('medication_id')->references('id')->on('medications');

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
        Schema::drop('disease_medication');
    }
}
