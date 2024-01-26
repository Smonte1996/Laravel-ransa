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
        Schema::create('chcklt_liris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('info_checklist_id')->constrained()->onDelete('cascade');
            $table->foreignId('seco_frio_id')->constrained()->onDelete('cascade');
            $table->foreignId('pasillo_id')->constrained()->onDelete('cascade');
            $table->string('bam1');
            $table->char('bamo1','255')->nullable();
            $table->string('bam2');
            $table->char('bamo2','255')->nullable();
            $table->string('bam3');
            $table->char('bamo3','255')->nullable();
            $table->string('bam4');
            $table->char('bamo4','255')->nullable();
            $table->string('bam5');
            $table->char('bamo5','255')->nullable();
            $table->string('bam6');
            $table->char('bamo6','255')->nullable();
            $table->string('bam7');
            $table->char('bamo7','255')->nullable();
            $table->string('bam8');
            $table->char('bamo8','255')->nullable();
            $table->string('bam9');
            $table->char('bamo9','255')->nullable();
            $table->string('bam10');
            $table->char('bamo10','255')->nullable();
            $table->string('bam11');
            $table->char('bamo11','255')->nullable();
            $table->string('bam12');
            $table->char('bamo12','255')->nullable();
            $table->string('bam13');
            $table->char('bamo13','255')->nullable();
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
        Schema::dropIfExists('chcklt_liris');
    }
};
