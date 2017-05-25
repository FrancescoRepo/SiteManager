<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CF');
            $table->string('Name');
            $table->string('Surname');
            $table->string('Sex');
            $table->string('username')->unique();
            $table->string('password');
            $table->boolean('FirstLogin');
            $table->string('Email')->unique();
            $table->string('Phone');
            $table->integer('usertype_id')->unsigned();
            $table->foreign('usertype_id')->references('id')->on('user_types');
            $table->integer('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
