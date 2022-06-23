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
        Schema::create('likes', function (Blueprint $table) {

            $table->id('id_like');

            $table->unsignedBigInteger('id_user')->unasigned()->nullable();
            $table->foreign('id_user')->references('id_user')->on('users') ->onDelete('set null') ->onUpdate('cascade');

            $table->unsignedBigInteger('id_song')->unasigned()->nullable();
            $table->foreign('id_song')->references('id_song')->on('songs') ->onDelete('set null') ->onUpdate('cascade');

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
        Schema::dropIfExists('likes');

        $table->dropSoftDeletes();
    }
};
