<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('char_classes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // Mago, Guerrero, Tanque, Asesino
            $table->text('description');
            $table->string('role'); // mage, warrior, tank, assassin
            // Stats base de la clase
            $table->integer('base_hp')->default(100);
            $table->integer('base_energy')->default(100);
            $table->integer('base_attack')->default(10);
            $table->integer('base_defense')->default(10);
            $table->integer('base_speed')->default(10);
            $table->integer('base_magic')->default(0);
            // Solo el Mago puede usar habilidades mágicas de los reinos
            $table->boolean('has_magic')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('char_classes');
    }
};
