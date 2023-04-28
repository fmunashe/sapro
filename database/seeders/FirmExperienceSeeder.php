<?php

namespace Database\Seeders;

use App\Models\FirmExperience;
use Illuminate\Database\Seeder;

class FirmExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FirmExperience::factory(10)->create();
    }
}
