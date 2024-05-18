<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tournament_id');
            $table->unsignedBigInteger('player_one_id');
            $table->unsignedBigInteger('player_two_id');
            $table->unsignedBigInteger('winner_id')->nullable();
            $table->integer('score_player_one')->nullable();
            $table->integer('score_player_two')->nullable();
            $table->timestamps();

            $table->foreign('tournament_id')->references('id')->on('tournaments')->onDelete('cascade');
            $table->foreign('player_one_id')->references('id')->on('players');
            $table->foreign('player_two_id')->references('id')->on('players');
            $table->foreign('winner_id')->references('id')->on('players');
        });
    }

    public function down()
    {
        Schema::dropIfExists('matches');
    }
};
