<?php

namespace Database\Seeders;

use App\Models\ClientRevenue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientRevenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ClientRevenue::factory(10)->create();
    }
}
