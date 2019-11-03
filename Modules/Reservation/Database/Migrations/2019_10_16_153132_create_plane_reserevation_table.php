<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlaneresrvationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plane_resrvations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id');
            $table->integer('from_station_id');
            $table->integer('to_station_id');
            $table->integer('company_id');
            $table->integer('user_id');
            $table->date('from_date');
            $table->date('to_date');
            $table->date('seat');
            $table->text('note');
            $table->boolean('status')->default(0);
            $table->dateTime('canceled_at')->nullable();
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
        Schema::dropIfExists('plane_resrvations');
    }
}
