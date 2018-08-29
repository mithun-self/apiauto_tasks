<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerTables extends Migration
{

    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->nullable();
            $table->string('desc')->nullable();
            $table->boolean('delinquent')->default(0);


            $table->string('business_vat_id')->nullable();
            $table->float('account_balance')->nullable();

            $table->string('send_email_address')->nullable();
            $table->string('cc_email_address')->nullable();
            $table->integer('default_source_id')->nullable();
            $table->integer('merchant_id')->nullable();

            $table->timestamps();
        });

       /* Schema::create('customer_metadata', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->string('value');

            $table->timestamps();
        });

        Schema::create('customer_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key');
            $table->string('value');

            $table->timestamps();
        });
          */

    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('customers');
//        Schema::drop('customer_metadata');
//        Schema::drop('customer_settings');
    }
}
