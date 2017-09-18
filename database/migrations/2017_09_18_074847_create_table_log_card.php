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
            $table->string('nguoinhan', 32);
            $table->string('time', 32);
            $table->string('menhgia', 32);
            $table->string('magift', 255);
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
