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
        Schema::create('confirmacion_maquilas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Cabecera_id')->constrained();
            $table->foreignId('produccione_id')->constrained();
            $table->integer('cantidad_confirmada');
            $table->string('Observacion');
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
        Schema::dropIfExists('confirmacion_maquilas');
    }
};
