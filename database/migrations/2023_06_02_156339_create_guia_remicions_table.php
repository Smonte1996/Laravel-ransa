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
        Schema::create('guia_remicions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cabecera_id')->constrained()->onDelete('cascade');
            $table->string('n_guia');
            $table->foreignId('user_id')->constrained()->nullable();
            $table->foreignId('user_id_confirmar')->constrained()->nullable();
            $table->integer('cantidad')->nullable();
            $table->string('observacion')->nullable();
            $table->string('estado');
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
        Schema::dropIfExists('guia_remicions');
    }
};
