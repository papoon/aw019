<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFeeds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('feeds',function(Blueprint $table){
            $table->increments('id');
            $table->string('url_feed',255);
            $table->string('fonte_feed',100);
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
        Schema::drop('feeds');
    }
}
