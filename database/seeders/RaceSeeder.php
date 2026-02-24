<?php

namespace Database\Seeders;

use App\Models\Race;
use Illuminate\Database\Seeder;

class RaceSeeder extends Seeder
{
    public function run(): void
    {
        $races = [
            [
                'name'        => 'Humano',
                'description' => 'Equilibrados en todos los atributos. Adaptables y versátiles, los humanos prosperan en ambos reinos con igual destreza.',
                'bonus_hp'      => 10,
                'bonus_energy'  => 10,
                'bonus_attack'  => 5,
                'bonus_defense' => 5,
                'bonus_speed'   => 5,
                'bonus_magic'   => 5,
            ],
            [
                'name'        => 'Elfo',
                'description' => 'Veloces y con gran reserva de energía. Los elfos son exploradores naturales, conectados con las corrientes mágicas del mundo.',
                'bonus_hp'      => 0,
                'bonus_energy'  => 25,
                'bonus_attack'  => 0,
                'bonus_defense' => 0,
                'bonus_speed'   => 20,
                'bonus_magic'   => 15,
            ],
            [
                'name'        => 'Enano',
                'description' => 'Resistentes como la roca. Los enanos son maestros de la defensa y la forja, con una vida que supera a cualquier otra raza.',
                'bonus_hp'      => 40,
                'bonus_energy'  => 0,
                'bonus_attack'  => 5,
                'bonus_defense' => 25,
                'bonus_speed'   => -10,
                'bonus_magic'   => 0,
            ],
            [
                'name'        => 'Orco',
                'description' => 'Fuerza bruta inigualable. Los orcos son guerreros natos que canalizan su fuerza en ataques devastadores.',
                'bonus_hp'      => 20,
                'bonus_energy'  => 0,
                'bonus_attack'  => 30,
                'bonus_defense' => 10,
                'bonus_speed'   => -5,
                'bonus_magic'   => -10,
            ],
            [
                'name'        => 'Dragón',
                'description' => 'Seres de poder primordial. Los dragones poseen una energía y un poder ofensivo sin parangón, pero su naturaleza los hace únicos y difíciles de dominar.',
                'bonus_hp'      => 20,
                'bonus_energy'  => 30,
                'bonus_attack'  => 20,
                'bonus_defense' => 10,
                'bonus_speed'   => 5,
                'bonus_magic'   => 25,
            ],
        ];

        foreach ($races as $race) {
            Race::create($race);
        }
    }
}
