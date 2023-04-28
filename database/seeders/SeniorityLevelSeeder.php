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
            ['seniorityLevelId' => 1, 'seniorityLevelCode' => 1, 'seniorityLevelDescription' => 'Experienced Advocate'],
            ['seniorityLevelId' => 2, 'seniorityLevelCode' => 2, 'seniorityLevelDescription' => 'Senior'],
            ['seniorityLevelId' => 3, 'seniorityLevelCode' => 3, 'seniorityLevelDescription' => 'Tax Senior'],
            ['seniorityLevelId' => 4, 'seniorityLevelCode' => 4, 'seniorityLevelDescription' => 'SIC'],
            ['seniorityLevelId' => 5, 'seniorityLevelCode' => 5, 'seniorityLevelDescription' => 'Tax'],
            ['seniorityLevelId' => 6, 'seniorityLevelCode' => 6, 'seniorityLevelDescription' => 'Assistant Manager'],
            ['seniorityLevelId' => 7, 'seniorityLevelCode' => 7, 'seniorityLevelDescription' => 'Manager']
        ];

        foreach ($levels as $level) {
            SeniorityLevel::query()->create($level);
        }
    }
}
