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
            $table->increments('id', 10);
            $table->string('CF', 16);
            $table->string('Name', 40);
            $table->string('Surname', 40);
            $table->string('Sex', 8);
            $table->string('username', 20)->unique();
            $table->string('password');
            $table->boolean('FirstLogin');
            $table->string('Email', 45)->unique();
            $table->string('Phone', 10);
            $table->integer('usertype_id')->unsigned();
            $table->foreign('usertype_id')->references('id')->on('user_types')->onDelete('cascade');
            $table->integer('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
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
