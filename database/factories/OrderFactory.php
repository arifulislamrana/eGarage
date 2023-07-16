<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $product_id = Product::all()->pluck('id');
        $user_id = User::all()->pluck('id');
        $employee_id = Employee::all()->pluck('id');
        return [
            'product_id' => $product_id[rand(0, count($product_id)-1)],
            'user_id' => $user_id[rand(0, count($user_id)-1)],
            'quantity' => rand(1, 10),
            'status' => 'pending',
            'phone' => fake()->phoneNumber(),
            'delivery_address' => fake()->sentence(8),
            'employee_id' => $employee_id[rand(0, count($employee_id)-1)],
            'order_date' => now(),
        ];
    }
}
