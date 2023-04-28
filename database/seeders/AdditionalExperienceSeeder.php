<?php

namespace Database\Seeders;

use App\Models\AdditionalExperience;
use Illuminate\Database\Seeder;

class AdditionalExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdditionalExperience::factory(10)->create();
    }
}
