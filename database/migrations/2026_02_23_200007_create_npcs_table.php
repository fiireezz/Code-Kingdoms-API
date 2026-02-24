<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('npcs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // reino al que pertenece el NPC (puede ser neutral)
            $table->foreignId('kingdom_id')->nullable()->constrained()->nullOnDelete();
            // merchant, enemy, ally, quest
            $table->string('role')->default('npc');
            $table->integer('hp')->default(100);
            $table->integer('attack')->default(10);
            $table->integer('defense')->default(10);
            $table->integer('speed')->default(10);
            $table->integer('level')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('npcs');
    }
};
