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
        Schema::create('receipts', function (Blueprint $table) {

            $table->id('id_receipt');
            $table->integer('amount');

            $table->unsignedBigInteger('used_method')->nullable();
            $table->foreign('used_method')->references('id_method')->on('payment_methods') ->onDelete('cascade') ->onUpdate('cascade');

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
        Schema::dropIfExists('receipts');

        $table->dropSoftDeletes();
    }
};
