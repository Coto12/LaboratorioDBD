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
        Schema::create('follows', function (Blueprint $table) {
            $table->increments('id_follow');

            $table->unsignedBigInteger('id_follower')->nullable();
            $table->foreign('id_follower')->references('id_user')->on('users');

            $table->unsignedBigInteger('id_following')->nullable();
            $table->foreign('id_following')->references('id_user')->on('users');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
};
