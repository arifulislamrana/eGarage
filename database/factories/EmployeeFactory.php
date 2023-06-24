<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $designation = ['Senior Engineer', 'Junior Engineer', 'Senior Mechanic', 'Junior Mechanic', 'Trainee', 'Cashier', 'Cleaner'];
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => bcrypt('123456'), // password
            'phone' => fake()->phoneNumber(),
            'designation' => $designation[rand(0, count($designation)-1)],
            'address' => fake()->address(),
        ];
    }
}
