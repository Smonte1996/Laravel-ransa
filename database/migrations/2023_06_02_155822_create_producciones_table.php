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
        Schema::create('producciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cabecera_id')->constrained()->onDelete('cascade');
            $table->foreignId('codigo_fconversione_id')->constrained();
            $table->text('descripcion')->nullable();
            $table->integer('cantidad');
            $table->string('empaque');
            $table->string('fecha')->nullable();
            $table->string('precio')->nullable();
            $table->date('datacheck')->nullable();
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
        Schema::dropIfExists('producciones');
    }
};
