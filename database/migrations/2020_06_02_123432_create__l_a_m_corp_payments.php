<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLAMCorpPayments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_l_a_m_corp_payments', function (Blueprint $table) {
            $table->bigIncrements('pay_id');
            $table->string('pay_number');
            $table->string('kiosk_number');
            $table->string('litres_purchased');
            $table->string('client_name');
            $table->string('client_phone');
            $table->string('till_number');
            $table->string('transaction_code');
            $table->string('amount');
            $table->longText('description');
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
        Schema::dropIfExists('_l_a_m_corp_payments');
    }
}
