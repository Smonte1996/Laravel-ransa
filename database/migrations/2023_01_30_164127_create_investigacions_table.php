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
        Schema::create('investigacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('solicitude_id')->constrained()->onDelete('cascade');
            $table->foreignId('employee_id')->constrained()->onDelete('cascade');
            $table->text('correccion')->nullable();
            $table->char('causa_raiz', 250)->nullable();
            $table->char('evaluacion_eficacia', 250)->nullable();
            $table->date('fecha_programada')->nullable();
            $table->char('observacion', 250)->nullable();
            $table->string('archivo')->nullable();
            $table->char('argumento',250)->nullable();
            $table->string('imagen')->nullable();
            $table->date('date_check')->nullable();
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
        Schema::dropIfExists('_investigacions');
    }
};
