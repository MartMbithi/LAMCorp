<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLAMCorpAdmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('_l_a_m_corp_admin', function (Blueprint $table) {
            $table->bigIncrements('a_id');
            $table->string('a_name');
            $table->string('a_email');
            $table->string('a_pwd');
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
        Schema::dropIfExists('_l_a_m_corp_admin');
    }
}
