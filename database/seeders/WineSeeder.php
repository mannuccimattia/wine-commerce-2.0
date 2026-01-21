<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Denomination;
use App\Models\Region;
use App\Models\Wine;
use App\Models\Winemaker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();
        $regions = Region::all();
        $denominations = Denomination::all();
        $winemakers = Winemaker::all();

        foreach ($winemakers as $winemaker) {
            Wine::factory(5)
                ->for($winemaker)
                ->recycle($categories)
                ->recycle($regions)
                ->recycle($denominations)
                ->create();
        }
    }
}
