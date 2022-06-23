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
        Schema::create('albums', function (Blueprint $table) {

            $table->id('id_album');
            $table->string('name_album');
            $table->string('release_date');

            $table->unsignedBigInteger('distributed_by')->unasigned()->nullable();
            $table->foreign('distributed_by')->references('id_distributor')->on('distributors') ->onDelete('set null')->onUpdate('cascade');
            
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
        Schema::dropIfExists('albums');

        $table->dropSoftDeletes();
    }
};
