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
        Schema::create('role_permissions', function (Blueprint $table) {
            
            $table->id('id_role_permission');

            $table->unsignedBigInteger('id_role')->unasigned()->nullable();
            $table->foreign('id_role')->references('id_role')->on('roles') ->onDelete('set null') ->onUpdate('cascade');

            $table->unsignedBigInteger('id_permission')->unasigned()->nullable();
            $table->foreign('id_permission')->references('id_permission')->on('permissions') ->onDelete('set null') ->onUpdate('cascade');

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
        Schema::dropIfExists('role_permissions');

        $table->dropSoftDeletes();
    }
};
