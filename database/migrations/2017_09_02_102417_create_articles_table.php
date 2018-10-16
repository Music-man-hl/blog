<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * 运行数据库迁移
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('cover')->nullable();
            $table->longText('content')->nullable();
            $table->boolean('is_top')->default(0);
            $table->boolean('is_hidden')->default(1);
            $table->integer('view')->default(0);
            $table->date('last_view')->nullable();
            $table->integer('comment')->default(0);
            $table->timestamps();
        });
    }

    /**
     * 回滚数据库迁移
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article');
    }
}
