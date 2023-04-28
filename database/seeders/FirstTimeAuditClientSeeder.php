<?php

namespace Database\Seeders;

use App\Models\FirstTimeAuditClient;
use Illuminate\Database\Seeder;

class FirstTimeAuditClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FirstTimeAuditClient::factory(10)->create();
    }
}
