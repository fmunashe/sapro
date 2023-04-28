<?php

namespace Database\Seeders;

use App\Models\InternationalExperience;
use Illuminate\Database\Seeder;

class InternationalExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        InternationalExperience::factory(10)->create();
    }
}
