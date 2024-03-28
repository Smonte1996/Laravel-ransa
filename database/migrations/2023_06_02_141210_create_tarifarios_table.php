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
        Schema::create('tarifarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained();
            $table->foreignId('servicio_maquila_id')->constrained();
            // $table->foreignId('supplier_id')->constrained();
            $table->string('actividad');
            // $table->string('factor_conversion');
            $table->string('tarifa_serypro');
            $table->string('tarifa_dprissa');
            $table->string('tarifa_cliente');
            $table->text('observacion')->nullable();
            $table->integer('estado');
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
        Schema::dropIfExists('tarifarios');
    }
};
