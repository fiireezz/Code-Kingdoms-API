<?php

namespace Database\Seeders;

use App\Models\CharClass;
use App\Models\Kingdom;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    public function run(): void
    {
        $guerrero = CharClass::where('name', 'Guerrero')->first();
        $tanque   = CharClass::where('name', 'Tanque')->first();
        $asesino  = CharClass::where('name', 'Asesino')->first();
        $mago     = CharClass::where('name', 'Mago')->first();
        $php      = Kingdom::where('name', 'PHP')->first();
        $java     = Kingdom::where('name', 'Java')->first();

        // ── GUERRERO ──────────────────────────────────────────────
        $guerreroSkills = [
            [
                'name'          => 'Golpe Potente',
                'description'   => 'Un ataque físico devastador que aplica el máximo de tu fuerza en un solo golpe.',
                'type'          => 'offensive',
                'damage_base'   => 35,
                'energy_cost'   => 20,
                'cooldown_turns'=> 0,
            ],
            [
                'name'          => 'Frenesí de Batalla',
                'description'   => 'El guerrero entra en estado de frenesí, aumentando su ataque un 50% durante 3 turnos.',
                'type'          => 'support',
                'damage_base'   => 0,
                'energy_cost'   => 30,
                'cooldown_turns'=> 4,
            ],
            [
                'name'          => 'Golpe Giratorio',
                'description'   => 'El guerrero gira con su arma, golpeando a todos los enemigos cercanos.',
                'type'          => 'offensive',
                'damage_base'   => 25,
                'energy_cost'   => 35,
                'cooldown_turns'=> 2,
            ],
            [
                'name'          => 'Escudo de Voluntad',
                'description'   => 'El guerrero se concentra y absorbe el siguiente golpe con la fuerza de su voluntad.',
                'type'          => 'defensive',
                'damage_base'   => 0,
                'energy_cost'   => 25,
                'cooldown_turns'=> 3,
            ],
        ];

        foreach ($guerreroSkills as $skill) {
            Skill::create(array_merge($skill, ['char_class_id' => $guerrero->id, 'kingdom_id' => null]));
        }

        // ── TANQUE ────────────────────────────────────────────────
        $tanqueSkills = [
            [
                'name'          => 'Provocación',
                'description'   => 'El tanque atrae la atención de todos los enemigos, obligándolos a atacarle a él.',
                'type'          => 'defensive',
                'damage_base'   => 0,
                'energy_cost'   => 20,
                'cooldown_turns'=> 3,
            ],
            [
                'name'          => 'Muro de Escudo',
                'description'   => 'El tanque levanta su escudo, reduciendo el daño recibido un 70% durante 2 turnos.',
                'type'          => 'defensive',
                'damage_base'   => 0,
                'energy_cost'   => 30,
                'cooldown_turns'=> 4,
            ],
            [
                'name'          => 'Golpe de Escudo',
                'description'   => 'Embiste al enemigo con el escudo, causando daño y aturdimiento.',
                'type'          => 'offensive',
                'damage_base'   => 20,
                'energy_cost'   => 25,
                'cooldown_turns'=> 2,
            ],
            [
                'name'          => 'Resiliencia',
                'description'   => 'El tanque regenera una parte de su vida máxima gracias a su entrenamiento.',
                'type'          => 'support',
                'damage_base'   => 0,
                'energy_cost'   => 40,
                'cooldown_turns'=> 5,
            ],
        ];

        foreach ($tanqueSkills as $skill) {
            Skill::create(array_merge($skill, ['char_class_id' => $tanque->id, 'kingdom_id' => null]));
        }

        // ── ASESINO ───────────────────────────────────────────────
        $asesinokills = [
            [
                'name'          => 'Ataque Furtivo',
                'description'   => 'Un golpe rápido desde las sombras con alta probabilidad de crítico.',
                'type'          => 'offensive',
                'damage_base'   => 40,
                'energy_cost'   => 25,
                'cooldown_turns'=> 1,
            ],
            [
                'name'          => 'Evasión',
                'description'   => 'El asesino se funde con las sombras, aumentando su evasión un 80% durante 1 turno.',
                'type'          => 'defensive',
                'damage_base'   => 0,
                'energy_cost'   => 20,
                'cooldown_turns'=> 3,
            ],
            [
                'name'          => 'Combo Letal',
                'description'   => 'Una serie de tres golpes rápidos que acumulan daño exponencialmente.',
                'type'          => 'offensive',
                'damage_base'   => 55,
                'energy_cost'   => 45,
                'cooldown_turns'=> 3,
            ],
            [
                'name'          => 'Veneno',
                'description'   => 'Aplica veneno al enemigo, causando daño durante 3 turnos.',
                'type'          => 'offensive',
                'damage_base'   => 15,
                'energy_cost'   => 30,
                'cooldown_turns'=> 2,
            ],
        ];

        foreach ($asesinokills as $skill) {
            Skill::create(array_merge($skill, ['char_class_id' => $asesino->id, 'kingdom_id' => null]));
        }

        // ── MAGO – Hechizos PHP ───────────────────────────────────
        $magoPhpSkills = [
            [
                'name'          => 'Variable Global',
                'description'   => 'Invoca el poder de las variables globales de PHP, alterando la realidad del campo de batalla y debilitando a todos los enemigos.',
                'type'          => 'offensive',
                'damage_base'   => 30,
                'energy_cost'   => 35,
                'cooldown_turns'=> 1,
            ],
            [
                'name'          => 'Sesión Persistente',
                'description'   => 'Abre una sesión mágica que otorga bonificaciones persistentes durante 4 turnos: +20% ataque mágico y regeneración de energía.',
                'type'          => 'support',
                'damage_base'   => 0,
                'energy_cost'   => 50,
                'cooldown_turns'=> 5,
            ],
            [
                'name'          => 'Array Explosivo',
                'description'   => 'Lanza un array de proyectiles mágicos que golpean al enemigo en rápida sucesión.',
                'type'          => 'offensive',
                'damage_base'   => 50,
                'energy_cost'   => 45,
                'cooldown_turns'=> 2,
            ],
            [
                'name'          => 'Función Recursiva',
                'description'   => 'Un hechizo que se repite a sí mismo, escalando en poder con cada iteración hasta 3 veces.',
                'type'          => 'offensive',
                'damage_base'   => 20,
                'energy_cost'   => 40,
                'cooldown_turns'=> 3,
            ],
            [
                'name'          => 'Include Mágico',
                'description'   => 'El mago incluye el conocimiento de un scroll arcano, recuperando 60 puntos de energía.',
                'type'          => 'support',
                'damage_base'   => 0,
                'energy_cost'   => 0,
                'cooldown_turns'=> 4,
            ],
        ];

        foreach ($magoPhpSkills as $skill) {
            Skill::create(array_merge($skill, ['char_class_id' => $mago->id, 'kingdom_id' => $php->id]));
        }

        // ── MAGO – Hechizos Java ──────────────────────────────────
        $magoJavaSkills = [
            [
                'name'          => 'Sobrecarga de Métodos',
                'description'   => 'Invoca múltiples versiones del mismo hechizo simultáneamente, saturando al enemigo con variantes del mismo ataque mágico.',
                'type'          => 'offensive',
                'damage_base'   => 45,
                'energy_cost'   => 40,
                'cooldown_turns'=> 2,
            ],
            [
                'name'          => 'Encapsulamiento',
                'description'   => 'Encierra al mago en una burbuja de encapsulamiento, volviéndole inmune al daño durante 1 turno.',
                'type'          => 'defensive',
                'damage_base'   => 0,
                'energy_cost'   => 45,
                'cooldown_turns'=> 4,
            ],
            [
                'name'          => 'Clase Abstracta',
                'description'   => 'Invoca un constructo mágico abstracto que debilita el ataque del oponente un 40% durante 3 turnos.',
                'type'          => 'support',
                'damage_base'   => 0,
                'energy_cost'   => 50,
                'cooldown_turns'=> 5,
            ],
            [
                'name'          => 'NullPointerException',
                'description'   => 'Un hechizo devastador que anula las defensas del enemigo de forma abrupta, causando daño masivo.',
                'type'          => 'offensive',
                'damage_base'   => 70,
                'energy_cost'   => 60,
                'cooldown_turns'=> 4,
            ],
            [
                'name'          => 'Herencia Ancestral',
                'description'   => 'El mago hereda el poder de todos sus antepasados, aumentando todos sus stats un 25% durante 3 turnos.',
                'type'          => 'support',
                'damage_base'   => 0,
                'energy_cost'   => 55,
                'cooldown_turns'=> 6,
            ],
        ];

        foreach ($magoJavaSkills as $skill) {
            Skill::create(array_merge($skill, ['char_class_id' => $mago->id, 'kingdom_id' => $java->id]));
        }
    }
}
