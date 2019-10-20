<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('departure_time');
            $table->string('arrive_time');
            $table->string('number');
            $table->integer('price');
            $table->integer('saleprice');
            $table->date('date');
            $table->unsignedBigInteger('company_id')->foreign()->references('id')->on('companies');
            $table->unsignedBigInteger('from_station_id')->foreign()->references('id')->on('stations');
            $table->unsignedBigInteger('to_station_id')->foreign()->references('id')->on('stations');
            $table->text('description')->nullable();
            $table->tinyInteger('seats_number')->default(49);
            $table->tinyInteger('status');
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
        Schema::dropIfExists('trips');
    }
}
