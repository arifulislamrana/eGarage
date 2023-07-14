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
        $status = ['active', 'deactive'];
        return [
            'name' => fake()->name(),
            'price' => rand(1000, 9000),
            'description' => fake()->sentence(10),
            'image' => '\Uploads\Product\168892665137519167.png',
            'status' => $status[rand(0, 1)],
            'category_id' => $category[rand(0, count($category)-1)],
            'discount_id' => $category[rand(0, count($discount)-1)],
            'buying_price' => rand(10, 1000),
            'dealer' => 'Mr. Dealer',
            'quantity' => rand(50, 100),
            'sold' => rand(10, 30),
        ];
    }
}
