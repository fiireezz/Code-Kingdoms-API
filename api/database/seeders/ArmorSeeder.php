<?php

namespace Database\Seeders;

use App\Models\Armor;
use Illuminate\Database\Seeder;

class ArmorSeeder extends Seeder
{
    public function run(): void
    {
        $armors = [
            // Ligera (Asesino / Mago)
            ['name' => 'Ropa de Cuero',       'description' => 'Protección mínima, máxima movilidad.',                    'defense_bonus' => 5,  'type' => 'light',  'price' => 60],
            ['name' => 'Manto Arcano',         'description' => 'Manto de mago que amplifica la resistencia mágica.',     'defense_bonus' => 8,  'type' => 'light',  'price' => 200],
            ['name' => 'Armadura de Sombras',  'description' => 'Armadura ligera encantada para los asesinos del reino.', 'defense_bonus' => 12, 'type' => 'light',  'price' => 350],
            // Media (Guerrero)
            ['name' => 'Cota de Mallas',       'description' => 'Malla metálica que ofrece buena protección sin pesar mucho.','defense_bonus' => 15, 'type' => 'medium','price' => 250],
            ['name' => 'Coraza del Guerrero',  'description' => 'Armadura diseñada para equilibrar ataque y defensa.',    'defense_bonus' => 20, 'type' => 'medium', 'price' => 450],
            // Pesada (Tanque)
            ['name' => 'Armadura de Placas',   'description' => 'Pesada pero muy efectiva. Reduce el daño al mínimo.',    'defense_bonus' => 28, 'type' => 'heavy',  'price' => 600],
            ['name' => 'Fortaleza de Acero',   'description' => 'La armadura más resistente del reino. Solo para tanques.','defense_bonus' => 35, 'type' => 'heavy',  'price' => 900],
        ];

        foreach ($armors as $armor) {
            Armor::create($armor);
        }
    }
}
