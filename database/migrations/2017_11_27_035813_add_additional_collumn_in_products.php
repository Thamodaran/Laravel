<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalCollumnInProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('products', function($table) {
          $table->float('p_cgst_percentage');
          $table->float('p_sgst_percentage');
          $table->integer('p_pe_id');
      });
      Schema::table('products', function (Blueprint $table) {
          // $table->dropColumn('p_tax');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
