<?php

namespace Database\Seeders;

use App\Models\ListedClient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ListedClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ListedClient::factory(10)->create();
    }
}
