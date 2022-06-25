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
        Schema::create('subscriptions', function (Blueprint $table) {

            $table->id('id_subscription');
            $table->string('state');
            $table->string('start_date');
            $table->string('end_date');

            $table->unsignedBigInteger('payment_method')->unasigned()->nullable();
            $table->foreign('payment_method')->references('id_method')->on('payment_methods') ->onDelete('set null') ->onUpdate('cascade');
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
        Schema::dropIfExists('subscriptions');
    }
};
