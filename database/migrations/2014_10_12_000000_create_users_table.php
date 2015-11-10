<?php

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
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->string('photo', 100);
            $table->bigInteger('number_login')->default(0);
            $table->bigInteger('fails_login')->default(0);
            $table->integer('role_id')->unsigned();
            $table->boolean('seen')->default(false);
            $table->datetime('last_login')->nullable();
            $table->boolean('is_active')->default(0);
            $table->string('register_token', 100);
            $table->timestamps();
            $table->index(['email', 'password']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
