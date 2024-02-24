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
        Schema::create('maquila_novedades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cabecera_id')->constrained();
            $table->foreignId('programacione_id')->constrained();
            $table->string('sku');
            $table->string('cantidad');
            $table->string('caj_uni');
            $table->string('estado');
            $table->text('observacion');
            $table->string('imagen');
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
        Schema::dropIfExists('maquila_novedades');
    }
};
