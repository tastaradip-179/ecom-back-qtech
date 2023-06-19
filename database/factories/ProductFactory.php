<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


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
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'code' => fake()->unique()->sentence(),
            'description' => fake()->text(),
            'category_id' => fake()->numberBetween(1, 10),
            'price' => fake()->numberBetween(100, 10000),
            'quantity' => fake()->numberBetween(0, 100),
            'warranty' => fake()->randomElement(['none', '6 months', '1 year', '2 years']),
            'seller_id' => fake()->numberBetween(1, 10),
            'brand_id' => fake()->numberBetween(1, 10),  
        ];
    }
}
