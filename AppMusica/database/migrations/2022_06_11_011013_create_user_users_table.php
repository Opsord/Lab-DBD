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
        Schema::create('user_users', function (Blueprint $table) {

            $table->id('id_user_user');

            $table->unsignedBigInteger('id_user')->unasigned()->nullable();
            $table->foreign('id_user')->references('id_user')->on('users') ->onDelete('set null') ->onUpdate('cascade');

            $table->unsignedBigInteger('id_user2')->unasigned()->nullable();
            $table->foreign('id_user2')->references('id_user')->on('users') ->onDelete('set null') ->onUpdate('cascade');
            
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
        Schema::dropIfExists('user_users');

        $table->dropSoftDeletes();
    }
};
