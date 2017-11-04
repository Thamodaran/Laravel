<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPurchaseEntry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('purchaseentries', function (Blueprint $table) {
             $table->increments('pe_id');
             // $table->string('p_product_code');
             // $table->string('p_product_name');
             // $table->string('p_product_model');
             $table->integer('pe_product_id');
             $table->integer('pe_user_id');
             $table->string('pe_quantity');
             $table->string('pe_buy_price');
             $table->string('pe_sell_price');
             // $table->string('se_user_discount');
            //  $table->string('pe_tax');
             $table->string('pe_comments');
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
         Schema::drop('purchaseentries');
     }
}
