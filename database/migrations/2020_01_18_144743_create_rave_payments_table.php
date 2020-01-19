<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRavePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rave_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('txid')->nullable();
            $table->string('txref', 50);
            $table->string('flwref')->nullable();
            $table->string('devicefingerprint')->nullable();
            $table->string('cycle', 30)->nullable();
            $table->unsignedInteger('amount')->nullable();
            $table->string('currency', 5)->nullable();
            $table->string('chargedAmount', 10)->nullable();
            $table->string('appfee')->nullable();
            $table->string('merchantfee')->nullable();
            $table->string('chargecode')->nullable();
            $table->string('chargemessage')->nullable();
            $table->string('authmodel')->nullable();
            $table->string('ip')->nullable();
            $table->string('narration')->nullable();
            $table->string('status')->nullable();
            $table->string('vbvcode')->nullable();
            $table->string('vbvmessage')->nullable();
            $table->string('authurl')->nullable();
            $table->string('acctcode')->nullable();
            $table->string('acctmessage')->nullable();
            $table->string('paymenttype')->nullable();
            $table->string('paymentid')->nullable();
            $table->string('fraudstatus')->nullable();
            $table->string('chargetype')->nullable();
            $table->unsignedSmallInteger('createdday')->nullable();
            $table->string('createddayname')->nullable();
            $table->unsignedSmallInteger('createdweek')->nullable();
            $table->unsignedSmallInteger('createdmonth')->nullable();
            $table->string('createdmonthname')->nullable();
            $table->unsignedSmallInteger('createdquarter')->nullable();
            $table->unsignedSmallInteger('createdyear')->nullable();
            $table->string('createdyearisleap')->nullable();
            $table->string('createddayispublicholiday')->nullable();
            $table->unsignedSmallInteger('createdhour')->nullable();
            $table->unsignedSmallInteger('createdminute')->nullable();
            $table->string('createdpmam', 4)->nullable();
            $table->timestamp('created')->nullable();
            $table->unsignedInteger('customerid')->nullable();
            $table->string('custphone')->nullable();
            $table->string('custnetworkprovider')->nullable();
            $table->string('custname')->nullable();
            $table->string('custemail')->nullable();
            $table->string('custemailprovider')->nullable();
            $table->timestamp('custcreated')->nullable();
            $table->unsignedInteger('accountid')->nullable();
            $table->string('accountbusinessname')->nullable();
            $table->string('acctcontactperson')->nullable();
            $table->string('acctcountry')->nullable();
            $table->unsignedSmallInteger('acctbearsfeeattransactiontime')->nullable();
            $table->unsignedInteger('accountparent')->nullable();
            $table->string('acctvpcmerchant')->nullable();
            $table->string('acctalias')->nullable();
            $table->unsignedSmallInteger('acctisliveapproved')->nullable();
            $table->string('orderref')->nullable();
            $table->string('paymentplan')->nullable();
            $table->string('paymentpage')->nullable();
            $table->string('raveref')->nullable();
            $table->string('amountsettledforthistransaction')->nullable();
            $table->string('card')->nullable();
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
        Schema::dropIfExists('rave_payments');
    }
}
