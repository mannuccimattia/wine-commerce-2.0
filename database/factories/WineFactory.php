<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Denomination;
use App\Models\Region;
use App\Models\Winemaker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Wine>
 */
class WineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake('it_IT')->unique()->words(3, true);

        return [
            'name' => ucwords($name),
            'slug' => Str::slug($name),
            'price' => fake()->randomFloat(2, 100, 1000),
            'alcohol' => fake()->randomFloat(2, 11, 14),
            'bottle_size' => fake()->randomElement([0.375, 0.750, 1.500]),
            'vintage' => fake()->numberBetween(1950, 2022),
            'stock' => fake()->numberBetween(0, 10),
            'image_front_url' => 'fake_front.jpg',
            'image_back_url' => 'fake_back.jpg',
            'grapes' => fake()->sentence(),
            'bottle_condition' => fake()->numberBetween(1, 5),
            'label_condition' => fake()->numberBetween(1, 5),
            'temperature' =>  fake()->numberBetween(14, 18) . '°C',
            'description' => fake()->paragraph(2, true),

            // dependencies
            'category_id' => Category::inRandomOrder()->first()?->id ?? Category::factory(),
            'region_id' => Region::inRandomOrder()->first()?->id ?? Region::factory(),
            'winemaker_id' => Winemaker::factory(),
            'denomination_id' => Denomination::factory(),
        ];
    }
}
