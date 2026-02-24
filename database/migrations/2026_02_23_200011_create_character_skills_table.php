<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('character_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained()->cascadeOnDelete();
            $table->foreignId('skill_id')->constrained()->cascadeOnDelete();
            // false = habilidad bloqueada (se desbloquea al subir nivel)
            $table->boolean('is_unlocked')->default(false);
            $table->timestamps();

            $table->unique(['character_id', 'skill_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('character_skills');
    }
};
