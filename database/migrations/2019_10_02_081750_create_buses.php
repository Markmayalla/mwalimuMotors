<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('brand_id')->unsigned();
            $table->bigInteger('model_id')->unsigned();
            $table->bigInteger('bod_type_id')->unsigned();
            $table->bigInteger('driving_wheel_id')->unsigned();
            $table->bigInteger('transmission_id')->unsigned();
            $table->bigInteger('fuel_id')->unsigned();
            $table->double('price');
            $table->double('millage');
            $table->double('engine_size');
            $table->string('registration_year_date');
            $table->string('manufacture_year_date');
            $table->double('seat_no');
            $table->double('door');
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
        Schema::dropIfExists('cars');
    }
}
