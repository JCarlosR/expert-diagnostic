<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuleRecommendationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rule_recommendations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rule_id')->unsigned();
            $table->foreign('rule_id')->references('id')->on('rules');
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
        Schema::drop('rule_recommendations');
    }
}
