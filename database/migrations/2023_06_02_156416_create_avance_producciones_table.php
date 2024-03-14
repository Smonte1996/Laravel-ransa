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
        Schema::create('avance_producciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cabecera_id')->constrained()->onDelete('cascade');
            $table->foreignId('guia_remicion_id')->constrained()->onDelete('cascade');
            $table->string('unidades_caja');
            $table->integer('Cantidad_avance');
            $table->date('fecha_vencimiento');
            $table->string('lote')->nullable();
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
        Schema::dropIfExists('avance_producciones');
    }
};
