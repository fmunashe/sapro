<?php

namespace Database\Seeders;

use App\Models\IndustryCategory;
use Illuminate\Database\Seeder;

class IndustryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industries = [
            ['id' => 1, 'name' => 'General&Commercial'],
            ['id' => 2, 'name' => 'Financial Services'],
            ['id' => 3, 'name' => 'Real Estate'],
            ['id' => 4, 'name' => 'Not For Profit'],
        ];

        foreach ($industries as $industry) {
            IndustryCategory::query()->create($industry);
        }
    }
}
