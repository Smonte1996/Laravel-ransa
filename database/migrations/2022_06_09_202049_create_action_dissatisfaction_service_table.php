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
        Schema::create('action_dissatisfaction_service', function (Blueprint $table) {
            // $table->id();
            $table->foreignId('dissatisfaction_service_id')->constrained();
            $table->foreignId('action_id')->constrained();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('action_dissatisfaction_service');
    }
};
