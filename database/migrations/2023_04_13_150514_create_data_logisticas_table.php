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
        Schema::create('data_logisticas', function (Blueprint $table) {
            $table->id();
            $table->integer('sku_quala');
            $table->integer('sku_unilever');
            $table->string('cliente');
            $table->char('descripcion', 150);
            $table->integer('ean13');
            $table->integer('ean14');
            $table->integer('ean128');
            $table->string('registro_sanitario');
            $table->integer('vida_util');
            $table->double('pvp');
            $table->double('cajas_plancha');
            $table->double('plancha_estibas');
            $table->string('marca');
            $table->double('cajas_estibas');
            $table->date('fecha_actualizacion');
            $table->string('origen')->nullable();
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
        Schema::dropIfExists('data_logisticas');
    }
};
