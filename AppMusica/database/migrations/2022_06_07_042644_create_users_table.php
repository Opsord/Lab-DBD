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
        Schema::create('users', function (Blueprint $table) {

            $table->id('id_user');
            $table->string('name_user');
            $table->string('pass_user');
            $table->string('email');
            $table->string('birthday');

            $table->unsignedBigInteger('id_subscription')->unasigned()->nullable();
            $table->foreign('id_subscription')->references('id_subscription')->on('subscriptions') ->onDelete('set null') ->onUpdate('cascade');

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
        Schema::dropIfExists('users');

        $table->dropSoftDeletes();
    }
};
