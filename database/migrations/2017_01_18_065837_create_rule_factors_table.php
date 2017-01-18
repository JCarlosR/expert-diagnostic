<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuleFactorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rule_factors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('rule_id')->unsigned();
            $table->foreign('rule_id')->references('id')->on('rules');
            $table->integer('factor_id')->unsigned();
            $table->foreign('factor_id')->references('id')->on('factors');
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
        Schema::drop('rule_factors');
    }
}
