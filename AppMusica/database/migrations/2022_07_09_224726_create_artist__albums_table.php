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
        Schema::create('artist__albums', function (Blueprint $table) {

            $table->id('id_artist_album');

            $table->unsignedBigInteger('artist') ->unasigned()->nullable();
            $table->foreign('artist')->references('id_user')->on('users') ->onDelete('set null') ->onUpdate('cascade');

            $table->unsignedBigInteger('album') ->unasigned()->nullable();
            $table->foreign('album')->references('id_album')->on('albums') ->onDelete('set null') ->onUpdate('cascade');

            $table->timestamps();
            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('artist__albums');

        //$table->dropSoftDeletes();
    }
};
