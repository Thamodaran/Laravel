<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class User extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          $table->increments('u_id');
          $table->string('u_name');
          $table->string('u_address');
          $table->string('u_mob_number');
          $table->string('u_ph_number');
          $table->string('u_e_mail');
          $table->string('u_type');
          $table->string('u_discount');
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
        Schema::drop('users');
    }
}
