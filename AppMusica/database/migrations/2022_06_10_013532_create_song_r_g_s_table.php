<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('song_r_g_s', function (Blueprint $table) {

            $table->id('id_song_rg');

            $table->unsignedBigInteger('song')->nullable();
            $table->foreign('song')->references('id_song')->on('songs');

            $table->unsignedBigInteger('restricted_to')->nullable();
            $table->foreign('restricted_to')->references('id_country')->on('geographic_restrictions');

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
        Schema::dropIfExists('song_r_g_s');
    }
};
