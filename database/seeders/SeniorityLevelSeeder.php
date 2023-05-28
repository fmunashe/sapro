<?php

namespace Database\Seeders;

use App\Models\SeniorityLevel;
use Illuminate\Database\Seeder;

class SeniorityLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            ['seniorityLevelId' => 1, 'seniorityLevelCode' => 1, 'seniorityLevelDescription' => 'Experienced Associate'],
            ['seniorityLevelId' => 2, 'seniorityLevelCode' => 2, 'seniorityLevelDescription' => 'Senior'],
            ['seniorityLevelId' => 3, 'seniorityLevelCode' => 3, 'seniorityLevelDescription' => 'Senior In Charge'],
            ['seniorityLevelId' => 4, 'seniorityLevelCode' => 4, 'seniorityLevelDescription' => 'Manager'],
        ];

        foreach ($levels as $level) {
            SeniorityLevel::query()->create($level);
        }
    }
}
