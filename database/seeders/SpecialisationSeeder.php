<?php

namespace Database\Seeders;

use App\Models\Specialisation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecialisationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialisations = [
            ['specialisationId'=>1,'specialisationCode'=>1,'specialisationDescription'=>'External Audit'],
            ['specialisationId'=>2,'specialisationCode'=>2,'specialisationDescription'=>'External Audit/Tax'],
            ['specialisationId'=>3,'specialisationCode'=>3,'specialisationDescription'=>'External Tax'],
            ['specialisationId'=>4,'specialisationCode'=>4,'specialisationDescription'=>'Internal Audit'],
            ['specialisationId'=>5,'specialisationCode'=>5,'specialisationDescription'=>'Tax'],
            ['specialisationId'=>6,'specialisationCode'=>6,'specialisationDescription'=>'Transaction Advisory'],
            ['specialisationId'=>7,'specialisationCode'=>7,'specialisationDescription'=>'IT Audit']
        ];

        foreach ($specialisations as $specialisation) {
            Specialisation::query()->create($specialisation);
        }
    }
}
