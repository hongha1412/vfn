<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVipcmt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vipcmt', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('idfb');
            $table->string('name', 32);
            $table->integer('user');
            $table->text('noidung');
            $table->string('goi', 2);
            $table->integer('time');
            $table->integer('socmt');
            $table->integer('limitpost');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vipcmt');
    }
}
