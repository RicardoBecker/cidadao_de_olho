<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerbasJsonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verbas_json', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_deputado')->unsigned()->nullable();
            $table->longText('verbas');
            $table->string('mes_reembolso');
            $table->string('ano_reembolso');
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
        Schema::dropIfExists('verbas_json');
    }
}
