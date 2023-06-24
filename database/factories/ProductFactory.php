<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Discount;
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
        $category = Category::pluck('id')->toArray();
        $discount = Discount::pluck('id')->toArray();
        return [
            'name' => fake()->name(),
            'price' => rand(1000, 9000),
            'description' => fake()->sentence(10),
            'image' => 'dfd/hjgh/gghf',
            'category_id' => $category[rand(0, count($category)-1)],
            'discount_id' => $category[rand(0, count($discount)-1)],
        ];
    }
}
