<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = [
            ['name' => 'Abruzzo'],
            ['name' => 'Basilicata'],
            ['name' => 'Calabria'],
            ['name' => 'Campania'],
            ['name' => 'Emilia-Romagna'],
            ['name' => 'Friuli-Venezia Giulia'],
            ['name' => 'Lazio'],
            ['name' => 'Liguria'],
            ['name' => 'Lombardia'],
            ['name' => 'Marche'],
            ['name' => 'Molise'],
            ['name' => 'Piemonte'],
            ['name' => 'Puglia'],
            ['name' => 'Sardegna'],
            ['name' => 'Sicilia'],
            ['name' => 'Toscana'],
            ['name' => 'Trentino-Alto Adige'],
            ['name' => 'Umbria'],
            ['name' => 'Valle d\'Aosta'],
            ['name' => 'Veneto']
        ];

        foreach ($regions as $region) {
            DB::table('regions')->insert([
                'name' => $region['name'],
                'slug' => Str::slug($region['name']),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
