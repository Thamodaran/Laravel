<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PlanDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('plandetails', function (Blueprint $table) {
        $table->increments('id');
        $table->string('type');
        $table->string('amount')->unique();
        $table->string('no_of_months');
        $table->string('name');
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
        Schema::drop('plandetails');
    }
}
