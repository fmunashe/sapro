<?php

namespace Database\Seeders;

use App\Models\CertificationsAndEducation;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CertificationsAndEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CertificationsAndEducation::factory(10)->create();
    }
}
