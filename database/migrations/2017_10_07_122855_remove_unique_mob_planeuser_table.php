<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveUniqueMobPlaneuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('planusers', function(Blueprint $table)
        {
            $table->dropUnique('planusers_mobile_number_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('planusers', function(Blueprint $table)
        {
            $table->unique('mobile_number');
        });
    }
}
