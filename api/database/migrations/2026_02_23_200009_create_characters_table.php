<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('kingdom_id')->constrained();
            $table->foreignId('race_id')->constrained();
            $table->foreignId('char_class_id')->constrained();
            // Equipamiento actual (nullable – puede ir sin equipo)
            $table->foreignId('weapon_id')->nullable()->constrained('weapons')->nullOnDelete();
            $table->foreignId('armor_id')->nullable()->constrained('armors')->nullOnDelete();
            $table->string('name');
            $table->unsignedSmallInteger('level')->default(1);
            $table->unsignedInteger('experience')->default(0);
            $table->unsignedInteger('gold')->default(100);
            // Stats actuales del personaje (base clase + bonus raza)
            $table->integer('hp');
            $table->integer('max_hp');
            $table->integer('energy');
            $table->integer('max_energy');
            $table->integer('attack');
            $table->integer('defense');
            $table->integer('speed');
            $table->integer('magic');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
