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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->time('date');
            $table->integer('amount');
            $table->timestamps();

            $table->unsignedBigInteger('id_subscription')->nullable();
            $table->foreign('id_subscription')->references('id')->on('subscriptions');
            $table->unsignedBigInteger('id_payment_method')->nullable();
            $table->foreign('id_payment_method')->references('id')->on('payment_methods');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
};
