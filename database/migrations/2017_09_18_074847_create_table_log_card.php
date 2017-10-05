<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLogCard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_card', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid');
            $table->integer('receive_userid');
            $table->string('telco', 10);
            $table->string('serial', 100);
            $table->string('cardcode', 100);
            $table->integer('amount');
            $table->integer('price');
            $table->string('transid', 255);
            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_card');
    }
}
