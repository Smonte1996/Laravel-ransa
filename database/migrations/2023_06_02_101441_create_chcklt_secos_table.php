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
        Schema::create('chcklt_secos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('info_checklist_id')->constrained()->onDelete('cascade');
            $table->foreignId('seco_frio_id')->constrained()->onDelete('cascade');
            $table->foreignId('pasillo_id')->constrained()->onDelete('cascade');
            $table->string('bs1');
            $table->char('bso1','255')->nullable();
            $table->string('bs2');
            $table->char('bso2','255')->nullable();
            $table->string('bs3');
            $table->char('bso3','255')->nullable();
            $table->string('bs4');
            $table->char('bso4','255')->nullable();
            $table->string('bs5');
            $table->char('bso5','255')->nullable();
            $table->string('bs6');
            $table->char('bso6','255')->nullable();
            $table->string('bs7');
            $table->char('bso7','255')->nullable();
            $table->string('bs8');
            $table->char('bso8','255')->nullable();
            $table->string('bs9');
            $table->char('bso9','255')->nullable();
            $table->string('bs10');
            $table->char('bso10','255')->nullable();
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
        Schema::dropIfExists('chcklt_secos');
    }
};
