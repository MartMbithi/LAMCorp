<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLAMCorpExpenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_l_a_m_corp_expenses', function (Blueprint $table) {
            $table->bigIncrements('exp_id');
            $table->string('exp_code');
            $table->string('exp_type');
            $table->string('exp_from');
            $table->string('exp_to');
            $table->string('exp_amt');
            $table->string('kiosk_number');
            $table->longText('exp_desc');
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
        Schema::dropIfExists('_l_a_m_corp_expenses');
    }
}
