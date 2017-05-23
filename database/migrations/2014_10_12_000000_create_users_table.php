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
            $table->string('Nome');
            $table->string('Cognome');
            $table->string('Sesso');
            $table->string('Username')->unique();
            $table->string('Password');
            $table->boolean('PrimoLogin');
            $table->string('Email')->unique();
            $table->string('Telefono');
            $table->integer('TipoID');
            $table->string('ClientePI');
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
