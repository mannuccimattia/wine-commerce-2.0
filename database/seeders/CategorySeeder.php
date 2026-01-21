<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Red Wine'],
            ['name' => 'White Wine'],
            ['name' => 'Sparkling'],
            ['name' => 'Champagne']
        ];

        DB::table('categories')->insert($categories);
    }
}
