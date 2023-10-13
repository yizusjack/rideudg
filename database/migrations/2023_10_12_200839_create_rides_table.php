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
        Schema::create('rides', function (Blueprint $table) {
            $table->id();
            $table->date('date_t');
            $table->time('hour_t');
            $table->integer('passengers_t');
            $table->foreignId('places_id')->constrained()->onDelete('cascade');
            $table->foreignId('destiny_id')->references('id')->on('places')->onDelete('cascade');
            $table->foreignId('cars_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rides');
    }
};
