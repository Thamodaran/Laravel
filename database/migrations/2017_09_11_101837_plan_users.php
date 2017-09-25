<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlanUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('planusers', function (Blueprint $table) {
        $table->increments('id');
        $table->string('name');
        $table->string('mobile_number')->unique();
        $table->string('ph_number');
        $table->string('address');
        $table->rememberToken();
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
        Schema::drop('planusers');
    }
}
