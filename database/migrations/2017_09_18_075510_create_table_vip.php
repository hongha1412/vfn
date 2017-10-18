<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vip', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('idfb');
            $table->string('fbname', 32);
            $table->integer('userid');
            $table->string('package', 2);
            $table->integer('type');
            $table->dateTimeTz('expiretime');
            $table->integer('speed');
            $table->integer('limitpost')->nullable();
            $table->text('note')->nullable();
            $table->text('cmtcontent')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vip');
    }
}
