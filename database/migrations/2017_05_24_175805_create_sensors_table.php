<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Model');
            $table->float('Latitude');
            $table->float('Longitude');
            $table->integer('MaxValue');
            $table->integer('MinValue');
            $table->integer('site_id')->unsigned();
            $table->foreign('site_id')->references('id')->on('sites');
            $table->integer('brand_id')->unsigned();
            $table->foreign('brand_id')->references('id')->on('sensor_brands');
            $table->integer('sensortype_id')->unsigned();
            $table->foreign('sensortype_id')->references('id')->on('sensor_types');
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
        Schema::dropIfExists('sensors');
    }
}
