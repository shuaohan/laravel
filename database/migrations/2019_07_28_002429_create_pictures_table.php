<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *若要回滚最后一次迁移， 可以使用 rollback 命令。
     * 此命令将回滚最后一次 “迁移” 的操作，其中可能包含多个迁移文件：
     * php artisan migrate:rollback
     * 
     * migrate:reset 命令可以回滚应用程序中的所有迁移：
     * php artisan migrate:reset
     * @return void
     */
    public function up()
    {
        Schema::create('pictures', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->timestamps();
            $table->string('url');
            $table->text('title');

        });
    }

    /**
     * Reverse the migrations.
     *php artisan migrate:rollback
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
