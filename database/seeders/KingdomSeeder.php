<?php

namespace Database\Seeders;

use App\Models\Kingdom;
use Illuminate\Database\Seeder;

class KingdomSeeder extends Seeder
{
    public function run(): void
    {
        $kingdoms = [
            [
                'name' => 'PHP',
                'description' => 'El Reino de PHP es una tierra de pragmatismo y libertad creativa. Sus ciudadanos valoran la rapidez de desarrollo y la flexibilidad sobre la rigidez estructural.',
                'lore_excerpt' => 'En los valles donde el código fluye libre como el viento, los hechiceros de PHP dominan el arte de la interpretación dinámica. Sus variables cambian de forma a voluntad, sus funciones se invocan sin ceremonias y sus sesiones guardan los secretos más oscuros del reino.',
            ],
            [
                'name' => 'Java',
                'description' => 'El Reino de Java es una nación de estructura, orden y la promesa de "escribe una vez, ejecuta en cualquier lugar". Sus ciudadanos creen en la tipificación estricta y la arquitectura sólida.',
                'lore_excerpt' => 'Sobre las montañas donde la JVM resplandece como un sol eterno, los arquitectos de Java construyen castillos de clases y objetos. Todo está encapsulado, todo tiene su tipo, y la herencia fluye como linaje real a través de generaciones de clases abstractas.',
            ],
        ];

        foreach ($kingdoms as $kingdom) {
            Kingdom::create($kingdom);
        }
    }
}
