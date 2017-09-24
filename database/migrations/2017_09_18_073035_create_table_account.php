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
            $table->double('vnd')->nullable();
            $table->string('toida', 255)->nullable();
            $table->string('fullname', 255);
            $table->string('mail', 255);
            $table->string('sdt', 255)->nullable();
            $table->text('level')->nullable();
            $table->string('kichhoat', 10)->nullable();
            $table->string('avt', 255)->nullable();
            $table->string('about', 255)->nullable();
            $table->string('facebook', 255)->nullable();
            $table->string('ip', 255)->nullable();
            $table->string('macode', 255)->nullable();
            $table->string('remember_token', 100)->nullable();
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
