<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCollumnsForMonthList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::table('monthlylists', function($table) {
             $table->integer('amount');
             $table->integer('talu_amount');
             $table->integer('to_be_paid');
             $table->integer('amount_recived');
             $table->integer('balance');
         });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('monthlylists', function($table) {
        $table->dropColumn('amount');
        $table->dropColumn('talu_amount');
        $table->dropColumn('to_be_paid');
        $table->dropColumn('amount_recived');
        $table->dropColumn('balance');
      });
    }
}
