<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMerchantfeemapTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('merchantfeemaps', function (Blueprint $table) {

            $table->increments('id');

            $table->timestamps();
            //$table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('merchantfeemaps');
    }
}
