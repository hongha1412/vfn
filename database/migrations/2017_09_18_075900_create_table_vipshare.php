<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVipshare extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vipshare', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('idfb');
            $table->string('name', 32);
            $table->integer('user');
            $table->string('goi', 2);
            $table->integer('time');
            $table->integer('soshare');
            $table->integer('limitpost');
            $table->text('chuthich');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vipshare');
    }
}
