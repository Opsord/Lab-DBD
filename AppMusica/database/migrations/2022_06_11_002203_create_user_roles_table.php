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
        Schema::create('user_roles', function (Blueprint $table) {

            $table->id('id_user_role');

            $table->unsignedBigInteger('id_user')->unasigned()->nullable();
            $table->foreign('id_user')->references('id_user')->on('users') ->onDelete('set null') ->onUpdate('cascade');

            $table->unsignedBigInteger('id_role')->unasigned()->nullable();
            $table->foreign('id_role')->references('id_role')->on('roles') ->onDelete('set null') ->onUpdate('cascade');
            
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
        Schema::dropIfExists('user_rols');

        $table->dropSoftDeletes();
    }
};
