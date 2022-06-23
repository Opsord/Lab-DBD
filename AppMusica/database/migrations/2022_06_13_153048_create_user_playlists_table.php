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
        Schema::create('user_playlists', function (Blueprint $table) {

            $table->id('id_user_playlist');

            $table->unsignedBigInteger('id_user')->nullable();
            $table->foreign('id_user')->references('id_user')->on('users') ->onDelete('cascade') ->onUpdate('cascade');

            $table->unsignedBigInteger('id_playlist')->nullable();
            $table->foreign('id_playlist')->references('id_playlist')->on('playlists') ->onDelete('cascade') ->onUpdate('cascade');

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
        Schema::dropIfExists('user_playlists');

        $table->dropSoftDeletes();
    }
};
