<?php

namespace Database\Seeders;

use App\Models\CharClass;
use Illuminate\Database\Seeder;

class CharClassSeeder extends Seeder
{
    public function run(): void
    {
        $classes = [
            [
                'name'         => 'Guerrero',
                'description'  => 'Clase equilibrada entre ataque y defensa. El Guerrero es la columna vertebral de cualquier grupo, fiable en todas las situaciones.',
                'role'         => 'warrior',
                'base_hp'      => 130,
                'base_energy'  => 80,
                'base_attack'  => 18,
                'base_defense' => 15,
                'base_speed'   => 10,
                'base_magic'   => 0,
                'has_magic'    => false,
            ],
            [
                'name'         => 'Tanque',
                'description'  => 'Especializado en absorber daño y proteger a sus aliados. El Tanque es una fortaleza viviente con habilidades de provocación y reducción de daño.',
                'role'         => 'tank',
                'base_hp'      => 180,
                'base_energy'  => 60,
                'base_attack'  => 10,
                'base_defense' => 25,
                'base_speed'   => 6,
                'base_magic'   => 0,
                'has_magic'    => false,
            ],
            [
                'name'         => 'Asesino',
                'description'  => 'Velocidad y daño crítico son sus señas de identidad. El Asesino golpea rápido, esquiva con destreza y desaparece antes de que el enemigo reaccione.',
                'role'         => 'assassin',
                'base_hp'      => 90,
                'base_energy'  => 100,
                'base_attack'  => 20,
                'base_defense' => 8,
                'base_speed'   => 22,
                'base_magic'   => 0,
                'has_magic'    => false,
            ],
            [
                'name'         => 'Mago',
                'description'  => 'El único acceso a la magia arcana de los reinos. El Mago es frágil pero devastador, capaz de lanzar hechizos inspirados en PHP o Java según el reino elegido.',
                'role'         => 'mage',
                'base_hp'      => 80,
                'base_energy'  => 150,
                'base_attack'  => 8,
                'base_defense' => 6,
                'base_speed'   => 10,
                'base_magic'   => 25,
                'has_magic'    => true,
            ],
        ];

        foreach ($classes as $class) {
            CharClass::create($class);
        }
    }
}
