<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Service::factory(10)->create();

        $services = Service::all()->pluck('id');
        $users = User::all()->pluck('id');

        foreach ($services as $service)
        {
            foreach ($users as $user)
            {
                DB::table('user_service')->insert([
                    'user_id' => $user,
                    'service_id' => $service,
                ]);
            }
        }
    }
}
