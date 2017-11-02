<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('products', function (Blueprint $table) {
         $table->increments('p_id');
         $table->string('p_product_name');
         $table->string('p_product_code');
         $table->string('p_product_model');
         $table->string('p_tax');
        //  $table->string('p_image');
         $table->timestamps();
       });
     }

     public function down()
     {
       Schema::drop('products');
     }
}
