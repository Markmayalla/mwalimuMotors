<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusPictures extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_pictures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('car_id')->unsigned();
            $table->string('picture');
            $table->timestamps();
            $table->foreign('car_id')->references('id')->on('cars');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_pictures');
    }
}
