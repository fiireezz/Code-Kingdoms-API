<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            ['name' => 'Poción de Vida Menor',    'description' => 'Restaura 50 puntos de vida.',          'effect_type' => 'heal_hp',        'effect_value' => 50,  'price' => 30],
            ['name' => 'Poción de Vida Mayor',    'description' => 'Restaura 150 puntos de vida.',         'effect_type' => 'heal_hp',        'effect_value' => 150, 'price' => 80],
            ['name' => 'Elixir de Vida',          'description' => 'Restaura toda la vida del personaje.', 'effect_type' => 'heal_hp',        'effect_value' => 999, 'price' => 250],
            ['name' => 'Poción de Energía Menor', 'description' => 'Recupera 40 puntos de energía.',       'effect_type' => 'restore_energy', 'effect_value' => 40,  'price' => 35],
            ['name' => 'Poción de Energía Mayor', 'description' => 'Recupera 120 puntos de energía.',      'effect_type' => 'restore_energy', 'effect_value' => 120, 'price' => 90],
            ['name' => 'Cristal de Maná',         'description' => 'Recupera toda la energía del mago.',   'effect_type' => 'restore_energy', 'effect_value' => 999, 'price' => 280],
            ['name' => 'Tónico de Ataque',        'description' => 'Aumenta el ataque en 15 durante el combate.', 'effect_type' => 'buff_attack',    'effect_value' => 15,  'price' => 120],
            ['name' => 'Tónico de Defensa',       'description' => 'Aumenta la defensa en 15 durante el combate.','effect_type' => 'buff_defense',   'effect_value' => 15,  'price' => 120],
        ];

        foreach ($items as $item) {
            Item::create($item);
        }
    }
}
