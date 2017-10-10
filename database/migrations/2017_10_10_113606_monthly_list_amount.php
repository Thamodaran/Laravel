<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MonthlyListAmount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthlyamounts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('plan_id');
            $table->integer('monthlylist_id');
            $table->integer('total_tallu_amt');
            $table->string('month');
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
        Schema::drop('monthlyamounts');
    }
}
