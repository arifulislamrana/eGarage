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
        \App\Models\Booking::factory(5)->create();

        $bookings = Booking::all()->pluck('id');
        $services = Service::all()->pluck('id');

        for ($i=0; $i < count($bookings); $i++)
        {
            for ($j=0; $j < count($services); $j++)
            {
                DB::table('booking_service')->insert([
                    'booking_id' => $bookings[$i],
                    'service_id' => $services[$j],
                ]);
            }
        }

    }
}
