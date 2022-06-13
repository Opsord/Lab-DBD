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
        Schema::create('song_servers', function (Blueprint $table) {

            $table->id('id_song_server');

            $table->unsignedBigInteger('id_song')->nullable();
            $table->foreign('id_song')->references('id_song')->on('songs');

            $table->unsignedBigInteger('id_server')->nullable();
            $table->foreign('id_server')->references('id_server')->on('servers');
            
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
        Schema::dropIfExists('song_servers');
    }
};