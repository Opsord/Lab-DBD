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
        Schema::create('songs', function (Blueprint $table) {
            $table->id('id_song');
            $table->string('name_song');
            $table->time('duration');
            $table->unsignedBigInteger('id_album')->nullable();
            $table->foreign('id_album')->references('id_album')->on('albums');
            $table->unsignedBigInteger('id_country')->nullable();
            $table->foreign('id_country')->references('id_country')->on('geographic_locations');
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
        Schema::dropIfExists('songs');
    }
};
