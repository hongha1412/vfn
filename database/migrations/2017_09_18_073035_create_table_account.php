<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAccount extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 32);
            $table->string('password', 50);
            $table->double('vnd');
            $table->string('toida', 255);
            $table->string('fullname', 255);
            $table->string('mail', 255);
            $table->string('sdt', 255);
            $table->text('level');
            $table->string('kichhoat', 10);
            $table->string('avt', 255);
            $table->string('about', 255);
            $table->string('facebook', 255);
            $table->string('ip', 255);
            $table->string('macode', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account');
    }
}
