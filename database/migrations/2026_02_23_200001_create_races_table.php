<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('races', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Humano, Elfo, Enano, Orco, Dragón
            $table->text('description');
            // Bonificaciones pasivas (pueden ser negativas para balancear)
            $table->integer('bonus_hp')->default(0);
            $table->integer('bonus_energy')->default(0);
            $table->integer('bonus_attack')->default(0);
            $table->integer('bonus_defense')->default(0);
            $table->integer('bonus_speed')->default(0);
            $table->integer('bonus_magic')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('races');
    }
};
