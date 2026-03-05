<?php

namespace Database\Seeders;

use App\Models\Weapon;
use Illuminate\Database\Seeder;

class WeaponSeeder extends Seeder
{
    public function run(): void
    {
        $weapons = [
            // Espadas
            ['name' => 'Espada de Hierro',    'description' => 'Una espada básica forjada en hierro común.',              'attack_bonus' => 8,  'type' => 'sword',  'price' => 80],
            ['name' => 'Espada de Acero',     'description' => 'Espada de acero bien templado.',                          'attack_bonus' => 15, 'type' => 'sword',  'price' => 200],
            ['name' => 'Espada del Abismo',   'description' => 'Espada encantada que absorbe la energía del rival.',      'attack_bonus' => 25, 'type' => 'sword',  'price' => 600],
            // Hachas
            ['name' => 'Hacha de Guerra',     'description' => 'Hacha pesada que aplasta las defensas enemigas.',         'attack_bonus' => 20, 'type' => 'axe',    'price' => 250],
            ['name' => 'Hacha Doble Filo',    'description' => 'Dos filos letales en un solo arma.',                      'attack_bonus' => 28, 'type' => 'axe',    'price' => 500],
            // Arcos
            ['name' => 'Arco Corto',          'description' => 'Arco ligero, perfecto para ataques rápidos.',             'attack_bonus' => 12, 'type' => 'bow',    'price' => 150],
            ['name' => 'Arco Élfico',         'description' => 'Arco tallado en madera de árbol eterno. Muy preciso.',    'attack_bonus' => 22, 'type' => 'bow',    'price' => 450],
            // Bastones (Mago)
            ['name' => 'Bastón de Aprendiz',  'description' => 'Bastón de madera que amplifica ligeramente la magia.',    'attack_bonus' => 5,  'type' => 'staff',  'price' => 100],
            ['name' => 'Bastón de PHP',       'description' => 'Tallado con runas en PHP. Potencia los hechizos del reino.','attack_bonus' => 20,'type' => 'staff',  'price' => 500],
            ['name' => 'Bastón de Java',      'description' => 'Forjado con la JVM. Amplifica la magia de Java.',         'attack_bonus' => 20, 'type' => 'staff',  'price' => 500],
            // Dagas (Asesino)
            ['name' => 'Daga de Acero',       'description' => 'Daga ligera y afilada, ideal para golpes rápidos.',       'attack_bonus' => 10, 'type' => 'dagger', 'price' => 120],
            ['name' => 'Daga de Sombra',      'description' => 'Daga encantada que aumenta la probabilidad de crítico.',  'attack_bonus' => 18, 'type' => 'dagger', 'price' => 380],
        ];

        foreach ($weapons as $weapon) {
            Weapon::create($weapon);
        }
    }
}
