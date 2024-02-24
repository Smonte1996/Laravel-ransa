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
        Schema::create('maquila_producctividades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cabecera_id')->constrained();
            $table->foreignId('programacione_id')->constrained();
            $table->dateTime('hora_inicio');
            $table->dateTime('hora_pausa');
            $table->string('n_persona_1');
            $table->dateTime('hora_reinicio');
            $table->dateTime('hora_fin');
            $table->string('n_persona_2');
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
        Schema::dropIfExists('maquila_producctividades');
    }
};
