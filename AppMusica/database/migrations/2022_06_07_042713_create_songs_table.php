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
            $table->boolean('is_explicit');

            $table->unsignedBigInteger('album')->nullable();
            $table->foreign('album')->references('id_album')->on('albums');

            /* $table->unsignedBigInteger('restricted_to')->nullable();
            $table->foreign('restricted_to')->references('id_country')->on('geographic_restrictions'); */

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
