<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('site_name', 50);
            $table->string('skype', 50);
            $table->string('facebook');
            $table->text('site_des');
            $table->text('admin_des');
            $table->string('image_admin', 100);
            $table->string('logo_site', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin');
    }
}
