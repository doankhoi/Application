<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('firstname', 20);
            $table->string('lastname', 20);
            $table->integer('gender')->nullable();
            $table->string('tel', 11)->nullable();
            $table->string('city', 40)->nullable();
            $table->string('address', 100)->nullable();
            $table->boolean('online_status');
            $table->boolean('chat_status');
            $table->string('facebook_token')->nullable();
            $table->string('gmail_token')->nullable();
            $table->timestamps();
            $table->index(['firstname', 'lastname']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_infos');
    }
}
