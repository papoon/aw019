<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaginaConteudoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagina_conteudo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_pagina');
            $table->text('conteudo_texto');
            $table->text('conteudo_html');
            $table->string('tag_html',20);
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
        Schema::drop('pagina_conteudo');
    }
}
