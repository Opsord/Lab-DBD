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
        Schema::create('song_genres', function (Blueprint $table) {
            
            $table->id('id_song_genre');

            $table->unsignedBigInteger('song')->nullable();
            $table->foreign('song')->references('id_song')->on('songs');

            $table->unsignedBigInteger('genre')->nullable();
            $table->foreign('genre')->references('id_genre')->on('genres');

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
        Schema::dropIfExists('song_genres');
    }
};
