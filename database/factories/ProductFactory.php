<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Category;
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
            'name' => fake()->unique()->word,
            'category_id' => Category::factory()->create()->id,
            'brand_id' => Brand::factory()->create()->id,
            'description' => fake()->sentence,
            'images'=>json_encode(['image1.jpg','image2.jpg']),
            'buying_price' => fake()->numberBetween(100, 10000),
            'sale_price' => fake()->numberBetween(100, 10000),
            'is_active' => true,
            'is_featured' => false,
            'in_stock' => true,
            'on_sale' => true,
        ];
    }
}
