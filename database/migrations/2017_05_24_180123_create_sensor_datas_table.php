<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSensorDatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensor_datas', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('Date');
            $table->string('Description');
            $table->integer('Value');
            $table->integer('sensor_id')->unsigned();
            $table->foreign('sensor_id')->references('id')->on('sensors');
            $table->integer('error_id')->unsigned();
            $table->foreign('error_id')->references('id')->on('errors');
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
        Schema::dropIfExists('sensor_datas');
    }
}
