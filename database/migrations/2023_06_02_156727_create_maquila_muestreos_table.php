<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maquila_muestreos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cabecera_id')->constrained();
            $table->foreignId('programacione_id')->constrained();
            $table->integer('cantidad_muestra');
            $table->string('cj_un_muestra');
            $table->integer('cantidad_aceptado');
            $table->string('cj_un_aceptado');
            $table->integer('cantidad_rechazado');
            $table->string('cj_un_rechazado');
            $table->text('obervacion_rechazado');
            $table->integer('cantidad_reprocesado');
            $table->string('cj_un_reprocesado');
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
        Schema::dropIfExists('maquila_muestreos');
    }
};
