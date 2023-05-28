<?php

namespace Database\Seeders;

use App\Models\AssignmentType;
use Illuminate\Database\Seeder;

class AssignmentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $assignmentTypes = [
            ['id' => 1, 'assignmentType' => \App\Enums\AssignmentType::ONSHORE],
            ['id' => 2, 'assignmentType' => \App\Enums\AssignmentType::VIRTUAL],
            ['id' => 3, 'assignmentType' => \App\Enums\AssignmentType::HYBRID],
        ];

        foreach ($assignmentTypes as $assignmentType) {
            AssignmentType::query()->create($assignmentType);
        }
    }
}
