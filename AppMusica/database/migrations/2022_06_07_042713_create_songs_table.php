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

            $table->unsignedBigInteger('album')->unasigned()->nullable();
            $table->foreign('album')->references('id_album')->on('albums') ->onDelete('set null') ->onUpdate('cascade');

            /* $table->unsignedBigInteger('country')->unasigned()->nullable();
            $table->foreign('country')->references('id_country')->on('geographic_restrictions') ->onDelete('set null')->onUpdate('cascade'); */

            /* $table->unsignedBigInteger('genre')->unasigned()->nullable();
            $table->foreign('genre')->references('id_genre')->on('genres') ->onDelete('set null')->onUpdate('cascade'); */

            $table->unsignedBigInteger('artist')->unasigned()->nullable();
            $table->foreign('artist')->references('id_user')->on('users') ->onDelete('set null')->onUpdate('cascade');

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
