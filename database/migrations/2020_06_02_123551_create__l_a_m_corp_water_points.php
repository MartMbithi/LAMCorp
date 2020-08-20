<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLAMCorpWaterPoints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_l_a_m_corp_water_points', function (Blueprint $table) {
            $table->bigIncrements('wp_id');
            $table->string('wp_number');
            $table->string('wp_pass');
            $table->string('wp_phone');
            $table->string('wp_location');
            $table->string('wp_opening_hrs');
            $table->string('wp_closing_hrs');
            $table->string('wp_staff_on_duty');
            $table->string('wp_status');
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
        Schema::dropIfExists('_l_a_m_corp_water_points');
    }
}
