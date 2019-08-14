<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBoringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('picture');
            $table->tinyInteger('ishot');
            $table->tinyInteger('iscommend');
            $table->unsignedBigInteger('like');
            $table->unsignedInteger('click');
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
        Schema::dropIfExists('borings');
    }
}
