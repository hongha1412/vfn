<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLogBuy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_buy', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nguoiadd', 50);
            $table->string('goi', 2);
            $table->string('loaivip', 20);
            $table->string('thoigian', 50);
            $table->string('idvip', 50);
            $table->string('avatar', 5000);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_buy');
    }
}
