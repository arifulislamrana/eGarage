<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //$2y$10$b5eYf.FL4pz.ZQ16co/lAO0sUwe31TtfeoIhrXGavRa5uLF.i8qP6
        \App\Models\Admin::factory(1)->create();
    }
}
