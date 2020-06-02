<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLAMCorpStaffs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_l_a_m_corp_staffs', function (Blueprint $table) {
            $table->bigIncrements('staff_id');
            $table->string('staff_name');
            $table->string('staff_idno');
            $table->string('staff_email');
            $table->string('staff_phoneno');
            $table->string('staff_adr');
            $table->string('staff_dob');
            $table->string('staff_num');
            $table->string('staff_icon');
            $table->longText('staff_bio');
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
        Schema::dropIfExists('_l_a_m_corp_staffs');
    }
}
