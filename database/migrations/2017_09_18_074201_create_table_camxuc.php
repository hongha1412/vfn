<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCamxuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camxuc', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 32);
            $table->string('access_token', 32);
            $table->string('camxuc', 100);
            $table->integer('user');
            $table->integer('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('camxuc');
    }
}
