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
            ['contractStatusId' => 1, 'contractStatusCode' => 1, 'contractStatusDescription' => 'FTC'],
            ['contractStatusId' => 2, 'contractStatusCode' => 2, 'contractStatusDescription' => 'ICA(FT)'],
            ['contractStatusId' => 3, 'contractStatusCode' => 3, 'contractStatusDescription' => 'ICA(PERM)'],
            ['contractStatusId' => 4, 'contractStatusCode' => 4, 'contractStatusDescription' => 'PERM'],
            ['contractStatusId' => 5, 'contractStatusCode' => 5, 'contractStatusDescription' => 'FLEXI-PERM'],
            ['contractStatusId' => 6, 'contractStatusCode' => 6, 'contractStatusDescription' => 'ICA(FLEXI-PERM)'],
        ];

        foreach ($statuses as $status) {
            ContractStatus::query()->create($status);
        }
    }
}
