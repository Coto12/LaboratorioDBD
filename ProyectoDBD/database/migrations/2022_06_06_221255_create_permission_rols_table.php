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
        Schema::create('permission_rols', function (Blueprint $table) {
            $table->increments('id_permission_rols');
            $table->timestamps();
            
            $table->unsignedBigInteger('id_permission')->nullable();
            $table->foreign('id_permission')->references('id_permission')->on('permissions');
            $table->unsignedBigInteger('id_rol')->nullable();
            $table->foreign('id_rol')->references('id_rol')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_rols');
    }
};
