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
            $table->foreignId('programacione_id')->constrained()->onDelete('cascade');
            $table->foreignId('cabecera_id')->constrained()->onDelete('cascade');
            $table->string('detalle_personal');
            $table->integer('Cantidad_avance');
            $table->text('observacion')->nullable();
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
        Schema::dropIfExists('avance_producciones');
    }
};
