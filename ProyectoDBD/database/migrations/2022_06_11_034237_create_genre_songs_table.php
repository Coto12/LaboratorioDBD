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
        Schema::create('genre_songs', function (Blueprint $table) {
            $table->id();
            $table->string('genre_song_name');
            $table->timestamps();

            $table->unsignedBigInteger('id_song')->nullable();
            $table->foreign('id_song')->references('id')->on('songs');
            $table->unsignedBigInteger('id_genre')->nullable();
            $table->foreign('id_genre')->references('id')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genre_songs');
    }
};
