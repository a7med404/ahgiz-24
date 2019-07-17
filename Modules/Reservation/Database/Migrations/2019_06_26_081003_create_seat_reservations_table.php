<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeatReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('seat_reservations', function (Blueprint $table) { 
    //         $table->bigIncrements('id');
    //         $table->unsignedBigInteger('reservation_id')->foreign()->references('id')->on('reservations')->onDelete('cascade');
    //         $table->unsignedBigInteger('seat_id')->foreign()->references('id')->on('seats');
    //         $table->timestamps();
    //     });
    // }

    // /**
    //  * Reverse the migrations.
    //  *
    //  * @return void
    //  */
    // public function down()
    // {
    //     Schema::dropIfExists('seat_reservations');
    // }
}
