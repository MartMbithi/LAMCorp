<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLAMCorpVendors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_l_a_m_corp_vendors', function (Blueprint $table) {
            $table->bigIncrements('v_id');
            $table->string('v_number');
            $table->string('v_name');
            $table->longText('v_pobox');
            $table->longText('v_location');
            $table->string('v_email');
            $table->longText('v_phoneno');
            $table->string('v_icon');
            $table->longText('v_items');
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
        Schema::dropIfExists('_l_a_m_corp_vendors');
    }
}
