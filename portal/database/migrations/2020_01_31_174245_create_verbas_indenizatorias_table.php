<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerbasIndenizatoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verbas_indenizatorias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_deputado')->unsigned()->nullable();
            $table->decimal('valor', 8, 2);
            $table->integer('cod_tipo_despesa');
            $table->string('desc_tipo_despesa');
            $table->string('mes_reembolso');
            $table->string('ano_reembolso');
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
        Schema::dropIfExists('verbas_indenizatorias');
    }
}
