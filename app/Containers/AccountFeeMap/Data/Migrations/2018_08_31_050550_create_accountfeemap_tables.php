<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAccountfeemapTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('accountfeemaps', function (Blueprint $table) {

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
        Schema::drop('accountfeemaps');
    }
}
