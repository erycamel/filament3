<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'brand_id' => fake()->randomDigitNotNull(),
            'name' => fake()->text(),
            'slug' => fake()->text(),
            'sku' => fake()->text(),
            'image' => fake()->imageUrl(),
            'description' => fake()->realText(2000),
            'quantity' => fake()->randomNumber(),
            'price' => fake()->randomFloat(2, 2, 5),
            'is_visible' => 1,
            'is_featured' => 1,
            'type' => 'deliverable',
            'published_at' => now(),
        ];
    }
}
