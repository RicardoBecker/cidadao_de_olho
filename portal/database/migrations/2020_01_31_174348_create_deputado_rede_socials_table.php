<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeputadoRedeSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deputado_rede_socials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_rede_social');
            $table->integer('id_deputado')->unsigned()->nullable();
            $table->string('nome');
            $table->timestamps();

            $table->foreign('id_deputado')->references('id_deputado')->on('deputados');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deputado_rede_socials');
    }
}
