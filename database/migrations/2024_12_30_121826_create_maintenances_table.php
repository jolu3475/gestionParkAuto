<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('voiture_id');
            $table->unsignedBigInteger('reparation_id');
            $table->date('debut');
            $table->timestamps();

            $table->foreign('voiture_id')->references('id')->on('voitures')->onDelete('cascade');
            $table->foreign('reparation_id')->references('id')->on('reparations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
