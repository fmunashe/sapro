<?php

namespace Database\Seeders;

use App\Models\ContractStatus;
use Illuminate\Database\Seeder;

class ContractStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['contractStatusId' => 1, 'contractStatusCode' => 1, 'contractStatusDescription' => 'CONTRACTED FTC'],
            ['contractStatusId' => 2, 'contractStatusCode' => 2, 'contractStatusDescription' => 'CONTRACTED ICA'],
            ['contractStatusId' => 3, 'contractStatusCode' => 3, 'contractStatusDescription' => 'PERMANANT'],
            ['contractStatusId' => 4, 'contractStatusCode' => 4, 'contractStatusDescription' => 'NON-CONTRACTED'],
        ];

        foreach ($statuses as $status) {
            ContractStatus::query()->create($status);
        }
    }
}
