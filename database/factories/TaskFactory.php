<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users_id = User::all()->pluck('id');
        $employees_id = Employee::all()->pluck('id');
        $status = ['approved', 'done', 'undone'];
        return [
            'user_id' => $users_id[rand(0, count($users_id) - 1)],
            'employee_id' => $employees_id[rand(0, count($employees_id) - 1)],
            'status' => $status[rand(0, count($status) - 1)],
            'service_time' => fake()->dateTimeThisDecade(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
