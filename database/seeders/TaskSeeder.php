<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Task::factory(50)->create();

        $tasks = Task::all()->pluck('id');
        $services = Service::all()->pluck('id');

        for ($i=0; $i < count($tasks); $i++)
        {
            for ($j=0; $j < count($services); $j++)
            {
                DB::table('task_service')->insert([
                    'task_id' => $tasks[$i],
                    'service_id' => $services[$j],
                ]);
            }
        }
    }
}
