<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('player_power_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId('player_id')->constrained()->onDelete('cascade');
            $table->foreignId('power_specific_property_id')->constrained()->onDelete('cascade');
            $table->integer('value')->comment('The specific value of the property for the player.');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('player_power_properties');
    }



};
