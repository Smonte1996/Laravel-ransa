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
        Schema::create('cabeceras', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->string('cantidad');
            $table->foreignId('codigo_fconversione_id')->constrained()->onDelete('cascade');
            // $table->foreignId('tarifario_id')->constrained();
            $table->foreignId('client_id')->constrained();
            $table->foreignId('supplier_id')->constrained();
            $table->string('pvp')->nullable();
            $table->integer('ean13')->nullable();
            $table->integer('ean14')->nullable();
            $table->string('cj_un');
            $table->date('fecha');
            $table->integer('estado');
            $table->string('solicitud');
            $table->string('otcliente')->nullable();
            $table->text('sustento_cierre')->nullable();
            $table->string('imagen_sustento')->nullable();
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
        Schema::dropIfExists('cabeceras');
    }
};
