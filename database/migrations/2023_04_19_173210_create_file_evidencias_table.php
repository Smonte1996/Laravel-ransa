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
        Schema::create('file_evidencias', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evidencia_muestreo_id')->constrained()->onDelete('cascade');
            $table->foreignId('muestra_id')->constrained()->onDelete('cascede');
            $table->foreignId('data_logistica_id')->constrained()->onDelete('cascade');
            $table->string('name');
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
        Schema::dropIfExists('file_evidencias');
    }
};
