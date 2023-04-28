<?php

namespace Database\Seeders;

use App\Models\HostFirm;
use Illuminate\Database\Seeder;

class HostFirmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HostFirm::factory(10)->create();
    }
}
