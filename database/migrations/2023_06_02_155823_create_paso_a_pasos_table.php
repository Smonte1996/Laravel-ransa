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
        Schema::create('paso_a_pasos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cabecera_id')->constrained()->onDelete('cascade');
            $table->text('descripcion');
            $table->text('proceso');
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
        Schema::dropIfExists('paso_a_pasos');
    }
};
