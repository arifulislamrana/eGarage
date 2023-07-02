<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $user_id = User::all()->pluck('id');
        return [
            'user_id' => $user_id[rand(0, count($user_id) - 1)],
            'arrival_time' => fake()->dateTime(),
            'special_request' => fake()->sentence(15),
        ];
    }
}
