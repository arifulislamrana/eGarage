<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Booking::factory(15)->create();

        $bookings = Booking::all()->pluck('id');
        $services = Service::all()->pluck('id');

        for ($i=0; $i < 15; $i++)
        {
            DB::table('booking_service')->insert([
                'booking_id' => $bookings[rand(0, count($bookings) - 1)],
                'service_id' => $services[rand(0, count($services) - 1)],
            ]);
        }

    }
}
