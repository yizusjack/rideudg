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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('marcas_id')->constrained()->onDelete('cascade');
            $table->text('model_c');
            $table->foreignId('colors_id')->constrained()->onDelete('cascade');
            $table->text('placas_c');
            $table->foreignId('users_id')->constrained()->onDelete('cascade');
            $table->boolean('picset_c')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
