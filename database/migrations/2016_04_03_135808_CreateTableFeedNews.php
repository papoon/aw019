<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFeedNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('feed_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',100);
            $table->text('description');
            $table->string('link',100);
            $table->text('artigo');
            $table->string('img_link',100);
            $table->string('source',100);
            $table->dateTime('date_pub');
            $table->timestamp('create_at');
            $table->timestamp('update_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('feed_news');
    }
}
