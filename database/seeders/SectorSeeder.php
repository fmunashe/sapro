<?php

namespace Database\Seeders;

use App\Models\Sector;
use Database\Factories\SectorFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sector::factory(10)->create();
    }
}
