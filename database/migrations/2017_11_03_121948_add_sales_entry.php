<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSalesEntry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salesentries', function (Blueprint $table) {
            $table->increments('se_id');
            // $table->string('p_product_code');
            // $table->string('p_product_name');
            // $table->string('p_product_model');
            $table->integer('se_product_id');
            $table->integer('se_user_id');
            $table->string('se_quantity');
            $table->string('se_total_amt');
            $table->string('se_amt_given');
            $table->string('se_balance');
            // $table->string('se_user_discount');
            $table->string('se_tax');
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
        Schema::drop('salesentries');
    }
}
