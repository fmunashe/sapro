<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ['id' => 1, 'country' => 'United Kingdom', 'nationality' => 'British', 'isInternationalExperience' => true],
            ['id' => 2, 'country' => 'United States of America', 'nationality' => 'American', 'isInternationalExperience' => true],
            ['id' => 3, 'country' => 'Canada', 'nationality' => 'Canadian', 'isInternationalExperience' => true],
            ['id' => 4, 'country' => 'Netherlands', 'nationality' => 'Dutch', 'isInternationalExperience' => true],
            ['id' => 5, 'country' => 'Australia', 'nationality' => 'Australian', 'isInternationalExperience' => true],
            ['id' => 6, 'country' => 'New Zealand', 'nationality' => 'New Zealand', 'isInternationalExperience' => true],
            ['id' => 7, 'country' => 'South Africa', 'nationality' => 'South African', 'isInternationalExperience' => true],
            ['id' => 8, 'country' => 'Zimbabwe', 'nationality' => 'Zimbabwean', 'isInternationalExperience' => false],
            ['id' => 9, 'country' => 'Botswana', 'nationality' => 'Batswana', 'isInternationalExperience' => false],
            ['id' => 10, 'country' => 'DRC', 'nationality' => 'Congolese', 'isInternationalExperience' => false],
            ['id' => 11, 'country' => 'Ghana', 'nationality' => 'Ghanaian', 'isInternationalExperience' => false],
            ['id' => 12, 'country' => 'India', 'nationality' => 'Indian', 'isInternationalExperience' => false],
            ['id' => 13, 'country' => 'Kenya', 'nationality' => 'Kenyan', 'isInternationalExperience' => false],
            ['id' => 14, 'country' => 'Nigeria', 'nationality' => 'Nigerian', 'isInternationalExperience' => false],
            ['id' => 15, 'country' => 'Eswatini', 'nationality' => 'Swazi', 'isInternationalExperience' => false],
            ['id' => 16, 'country' => 'Tanzania', 'nationality' => 'Tanzanian', 'isInternationalExperience' => false],
            ['id' => 17, 'country' => 'Zambia', 'nationality' => 'Zambian', 'isInternationalExperience' => false],
            ['id' => 18, 'country' => 'United Arab Emirates', 'nationality' => 'United Arab Emirates', 'isInternationalExperience' => true],
        ];

        foreach ($countries as $country) {
            Country::query()->create($country);
        }
    }
}
