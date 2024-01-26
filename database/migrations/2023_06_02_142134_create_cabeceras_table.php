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
            $table->string('proveedor');
            $table->date('fecha');
            $table->string('cliente');
            $table->integer('estado');
            $table->string('solicitud');
            $table->string('otcliente');
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
