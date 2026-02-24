<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->foreignId('char_class_id')->constrained()->cascadeOnDelete();
            // Solo para las habilidades mágicas del Mago (null para clases físicas)
            $table->foreignId('kingdom_id')->nullable()->constrained()->nullOnDelete();
            // Tipo: offensive, defensive, support
            $table->string('type')->default('offensive');
            $table->integer('damage_base')->default(0);
            $table->integer('energy_cost')->default(0);
            // Turnos de reutilización (0 = sin cooldown)
            $table->integer('cooldown_turns')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
