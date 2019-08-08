<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customer_id')->foreign()->references('id')->on('customers');
            $table->unsignedBigInteger('trip_id')->foreign()->references('id')->on('trips');
            $table->unsignedBigInteger('user_id')->foreign()->references('id')->on('users')->nullable();
            $table->unsignedBigInteger('number')->unique();
            $table->unsignedBigInteger('number')->unique();
            $table->dateTime('conceled_at')->nullable();
            $table->tinyInteger('pay_method')->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
