<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\ProductCategory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->text(20),
            'info' => fake()->text(50),
            'price' => fake()->numberBetween($min=500,$max=10000),
            'stock' => fake()->numberBetween($min=1,$max=10),
            'category' =>  ProductCategory::random()->value,
            'image' => 'user_default.jpg',
            'brand_id' => \App\Models\Brand::factory(),
        ];
    }
}
