<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            KingdomSeeder::class,
            RaceSeeder::class,
            CharClassSeeder::class,
            SkillSeeder::class,
            WeaponSeeder::class,
            ArmorSeeder::class,
            ItemSeeder::class,
            NpcSeeder::class,
        ]);
    }
}
