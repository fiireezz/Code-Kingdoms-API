<?php

namespace Database\Seeders;

use App\Models\Kingdom;
use App\Models\Npc;
use Illuminate\Database\Seeder;

class NpcSeeder extends Seeder
{
    public function run(): void
    {
        $php  = Kingdom::where('name', 'PHP')->first();
        $java = Kingdom::where('name', 'Java')->first();

        $npcs = [
            // ── Comerciantes ──────────────────────────────────────
            [
                'name'      => 'Mercader Ramón el Dinámico',
                'kingdom_id'=> $php->id,
                'role'      => 'merchant',
                'hp'        => 50,
                'attack'    => 5,
                'defense'   => 5,
                'speed'     => 10,
                'level'     => 1,
            ],
            [
                'name'      => 'Comerciante Byron el Compilado',
                'kingdom_id'=> $java->id,
                'role'      => 'merchant',
                'hp'        => 50,
                'attack'    => 5,
                'defense'   => 5,
                'speed'     => 8,
                'level'     => 1,
            ],
            // ── Aliados ───────────────────────────────────────────
            [
                'name'      => 'Capitán Lara del Script',
                'kingdom_id'=> $php->id,
                'role'      => 'ally',
                'hp'        => 200,
                'attack'    => 30,
                'defense'   => 20,
                'speed'     => 14,
                'level'     => 10,
            ],
            [
                'name'      => 'General Arturo Bytecode',
                'kingdom_id'=> $java->id,
                'role'      => 'ally',
                'hp'        => 220,
                'attack'    => 28,
                'defense'   => 25,
                'speed'     => 12,
                'level'     => 10,
            ],
            // ── Enemigos ──────────────────────────────────────────
            [
                'name'      => 'Centinela del Bytecode',
                'kingdom_id'=> $java->id,
                'role'      => 'enemy',
                'hp'        => 80,
                'attack'    => 18,
                'defense'   => 15,
                'speed'     => 10,
                'level'     => 3,
            ],
            [
                'name'      => 'Guardián del Array',
                'kingdom_id'=> $php->id,
                'role'      => 'enemy',
                'hp'        => 75,
                'attack'    => 20,
                'defense'   => 12,
                'speed'     => 12,
                'level'     => 3,
            ],
            [
                'name'      => 'Arquitecto de Clases',
                'kingdom_id'=> $java->id,
                'role'      => 'enemy',
                'hp'        => 150,
                'attack'    => 25,
                'defense'   => 20,
                'speed'     => 8,
                'level'     => 7,
            ],
            [
                'name'      => 'Hechicero del Namespace',
                'kingdom_id'=> $php->id,
                'role'      => 'enemy',
                'hp'        => 120,
                'attack'    => 30,
                'defense'   => 10,
                'speed'     => 15,
                'level'     => 7,
            ],
            // ── Quest NPC ─────────────────────────────────────────
            [
                'name'      => 'El Oráculo del Código',
                'kingdom_id'=> null,
                'role'      => 'quest',
                'hp'        => 1,
                'attack'    => 0,
                'defense'   => 0,
                'speed'     => 0,
                'level'     => 99,
            ],
        ];

        foreach ($npcs as $npcData) {
            $npc = Npc::create($npcData);

            // Diálogos básicos
            $dialogs = $this->dialogsFor($npc->name);
            foreach ($dialogs as $i => $text) {
                $npc->dialogs()->create(['order' => $i, 'text' => $text]);
            }
        }
    }

    private function dialogsFor(string $name): array
    {
        $map = [
            'Mercader Ramón el Dinámico' => [
                '¡Bienvenido, viajero! En PHP todo es posible... ¡y barato!',
                '¿Qué buscas hoy? Tengo de todo: pociones, armas, y hasta alguna variable global suelta.',
                'Recuerda: en PHP el tipo lo pones tú. ¡O no lo pones!',
            ],
            'Comerciante Byron el Compilado' => [
                'Bienvenido al comercio. Aquí todo tiene su tipo y su lugar.',
                'Solo vendo artículos de calidad garantizada. Sin errores en tiempo de ejecución.',
                'Si no tienes suficiente oro, compila más.',
            ],
            'Capitán Lara del Script' => [
                'Soldado, este es territorio del Reino de PHP. Muéstrate digno.',
                'Los de Java creen que la estructura lo es todo. Nosotros sabemos que la flexibilidad gana guerras.',
            ],
            'General Arturo Bytecode' => [
                'Tu código es tan bueno como tu arquitectura. Recuérdalo.',
                'El Reino de Java ha prosperado gracias a la disciplina. ¿Estás listo para servir?',
            ],
            'El Oráculo del Código' => [
                'Los reinos están en guerra, pero la verdad es que el código que une es más poderoso que el que divide.',
                'Busca los tres artefactos perdidos: el Array Eterno, la Clase Madre y el Compilador Roto.',
                'Solo quien entienda ambos reinos podrá detener la guerra...',
            ],
        ];

        return $map[$name] ?? [
            '...',
            '*te observa en silencio*',
        ];
    }
}
