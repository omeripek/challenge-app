<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengeRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenge_request', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('playerXId')->unsigned();
            $table->boolean('playerXConfirm');
            $table->integer('playerYId')->unsigned();
            $table->boolean('playerYConfirm');

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
        Schema::dropIfExists('challenge_request');
    }
}
