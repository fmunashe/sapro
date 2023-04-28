<?php

namespace Database\Seeders;

use App\Models\AuditedWork;
use Illuminate\Database\Seeder;

class AuditedWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AuditedWork::factory(10)->create();
    }
}
