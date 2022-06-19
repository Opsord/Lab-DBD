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
            $table->string('is_explicit');

            $table->unsignedBigInteger('album')->nullable();
            $table->foreign('album')->references('id_album')->on('albums');

            $table->unsignedBigInteger('country')->nullable();
            $table->foreign('country')->references('id_country')->on('geographic_restrictions');

            $table->unsignedBigInteger('genre')->nullable();
            $table->foreign('genre')->references('id_genre')->on('genres');

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
        Schema::dropIfExists('songs');

        $table->dropSoftDeletes();
    }
};
