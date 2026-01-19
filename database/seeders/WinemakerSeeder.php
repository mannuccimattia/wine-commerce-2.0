<?php

namespace Database\Seeders;

use App\Models\Winemaker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WinemakerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Winemaker::factory(10)->create();
    }
}
