<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->boolean('seen');
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('post_id')
                    ->references('id')
                    ->on('posts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_user_id_foreign');
        });

        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign('comments_post_id_foreign');
        });

        Schema::drop('comments');
    }
}