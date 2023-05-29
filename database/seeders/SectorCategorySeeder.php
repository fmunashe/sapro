<?php

namespace Database\Seeders;

use App\Models\SectorCategory;
use Illuminate\Database\Seeder;

class SectorCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sectors = [
            ['industry_category_id' => 1, 'name' => 'Agriculture'],
            ['industry_category_id' => 1, 'name' => 'Tax - Administrative/Support'],
            ['industry_category_id' => 1, 'name' => 'Apparel'],
            ['industry_category_id' => 1, 'name' => 'Automotive Dealerships'],
            ['industry_category_id' => 1, 'name' => 'Cannabis'],
            ['industry_category_id' => 1, 'name' => 'Consumer & Industrial Goods'],
            ['industry_category_id' => 1, 'name' => 'Distribution & Logistics'],
            ['industry_category_id' => 1, 'name' => 'Government & Public Sectors'],
            ['industry_category_id' => 1, 'name' => 'Healthcare & Life Sciences'],
            ['industry_category_id' => 1, 'name' => 'Hospitality & Leisure'],
            ['industry_category_id' => 1, 'name' => 'Manufacturing'],
            ['industry_category_id' => 1, 'name' => 'Media & Entertainment'],
            ['industry_category_id' => 1, 'name' => 'Mining '],
            ['industry_category_id' => 1, 'name' => 'Oil & Gas'],
            ['industry_category_id' => 1, 'name' => 'Power & Utilities'],
            ['industry_category_id' => 1, 'name' => 'Professional Services'],
            ['industry_category_id' => 1, 'name' => 'Renewable Energy, Natural Resources & Chemicals'],
            ['industry_category_id' => 1, 'name' => 'Retail'],
            ['industry_category_id' => 1, 'name' => 'Schools/Education'],
            ['industry_category_id' => 1, 'name' => 'Technology'],
            ['industry_category_id' => 1, 'name' => 'Telecommunication'],
            ['industry_category_id' => 1, 'name' => 'Transport & Logistics'],
            ['industry_category_id' => 2, 'name' => 'Alternative Financing'],
            ['industry_category_id' => 2, 'name' => 'Asset Management'],
            ['industry_category_id' => 2, 'name' => 'Banking'],
            ['industry_category_id' => 2, 'name' => 'Broker Dealers'],
            ['industry_category_id' => 2, 'name' => 'Capital Assets'],
            ['industry_category_id' => 2, 'name' => 'Digital Assets'],
            ['industry_category_id' => 2, 'name' => 'Fintech'],
            ['industry_category_id' => 2, 'name' => 'Hedge Funds'],
            ['industry_category_id' => 2, 'name' => 'Insurance'],
            ['industry_category_id' => 2, 'name' => 'Mortgage Lenders/ Micro Lenders'],
            ['industry_category_id' => 2, 'name' => 'Private Equity '],
            ['industry_category_id' => 2, 'name' => 'Employee Benefit Plans'],
            ['industry_category_id' => 3, 'name' => 'Capital Projects & Infrastructure'],
            ['industry_category_id' => 3, 'name' => 'Commercial Real Estate'],
            ['industry_category_id' => 3, 'name' => 'Construction & Engineering'],
            ['industry_category_id' => 3, 'name' => 'Housing & Urban Development'],
            ['industry_category_id' => 3, 'name' => 'Property Development'],
            ['industry_category_id' => 3, 'name' => 'REITs'],
            ['industry_category_id' => 3, 'name' => 'Residential Real Estate'],
            ['industry_category_id' => 4, 'name' => 'Associations'],
            ['industry_category_id' => 4, 'name' => 'Educational Institutes'],
            ['industry_category_id' => 4, 'name' => 'Charities'],
            ['industry_category_id' => 4, 'name' => 'Education'],
        ];
        foreach ($sectors as $sector) {
            SectorCategory::query()->create($sector);
        }
    }
}
