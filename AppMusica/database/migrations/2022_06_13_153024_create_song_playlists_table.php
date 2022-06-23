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
        Schema::create('song_playlists', function (Blueprint $table) {

            $table->id('id_song_playlist');

            $table->unsignedBigInteger('id_song')->unasigned()->nullable();
            $table->foreign('id_song')->references('id_song')->on('songs') ->onDelete('set null') ->onUpdate('cascade');

            $table->unsignedBigInteger('id_playlist')->unasigned()->nullable();
            $table->foreign('id_playlist')->references('id_playlist')->on('playlists') ->onDelete('set null') ->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('song_playlists');

        $table->dropSoftDeletes();
    }
};
