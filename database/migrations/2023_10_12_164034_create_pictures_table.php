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
        Schema::create('pictures', function (Blueprint $table) {
            $table->id();
            $table->string('hash');
            $table->string('nombre');
            $table->string('extension');
            $table->string('mime');
            $table->foreignId('cars_id')->constrained()->onDelete('cascade');
            $table->enum('type_p', [1, 2, 3, 4]);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pictures');
    }
};
