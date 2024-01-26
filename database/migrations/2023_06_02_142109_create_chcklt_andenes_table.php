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
        Schema::create('chcklt_andenes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('info_checklist_id')->constrained()->onDelete('cascade');
            $table->foreignId('seco_frio_id')->constrained()->onDelete('cascade');
            $table->foreignId('pasillo_id')->constrained()->onDelete('cascade');
            $table->string('ba1');
            $table->string('bao1')->nullable();
            $table->string('ba2');
            $table->string('bao2')->nullable();
            $table->string('ba3');
            $table->string('bao3')->nullable();
            $table->string('ba4');
            $table->string('bao4')->nullable();
            $table->string('ba5');
            $table->string('bao5')->nullable();
            $table->string('ba6');
            $table->string('bao6')->nullable();
            $table->string('ba7');
            $table->string('bao7')->nullable();
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
        Schema::dropIfExists('chcklt_andenes');
    }
};
