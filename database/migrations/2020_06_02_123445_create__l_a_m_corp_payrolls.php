<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLAMCorpPayrolls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_l_a_m_corp_payrolls', function (Blueprint $table) {
            $table->bigIncrements('payroll_id');
            $table->string('payroll_code');
            $table->string('staff_id');
            $table->string('staff_number');
            $table->string('staff_name');
            $table->string('staff_email');
            $table->string('staff_idno');
            $table->string('pay_record');
            $table->string('salary');
            $table->string('taxation');
            $table->string('alw');
            $table->longText('comments');
            $table->string('bank_name');
            $table->string('bank_acc');
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
        Schema::dropIfExists('_l_a_m_corp_payrolls');
    }
}
