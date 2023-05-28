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
            ['id'=>1,'country' => 'United Kingdom','nationality'=>'British'],
            ['id'=>2,'country' => 'United States of America','nationality'=>'American'],
            ['id'=>3,'country' => 'Canada','nationality'=>'Canadian'],
            ['id'=>4,'country' => 'Netherlands','nationality'=>'Dutch'],
            ['id'=>5,'country' => 'Australia','nationality'=>'Australian'],
            ['id'=>6,'country' => 'New Zealand','nationality'=>'New Zealand'],
            ['id'=>7,'country' => 'South Africa','nationality'=>'South African'],
            ['id'=>8,'country' => 'Zimbabwe','nationality'=>'Zimbabwean'],
            ['id'=>9,'country' => 'Botswana','nationality'=>'Batswana'],
            ['id'=>10,'country' => 'DRC','nationality'=>'Congolese'],
            ['id'=>11,'country' => 'Ghana','nationality'=>'Ghanaian'],
            ['id'=>12,'country' => 'India','nationality'=>'Indian'],
            ['id'=>13,'country' => 'Kenya','nationality'=>'Kenyan'],
            ['id'=>14,'country' => 'Nigeria','nationality'=>'Nigerian'],
            ['id'=>15,'country' => 'Eswatini','nationality'=>'Swazi'],
            ['id'=>16,'country' => 'Tanzania','nationality'=>'Tanzanian'],
            ['id'=>17,'country' => 'Zambia','nationality'=>'Zambian'],
            ['id'=>17,'country' => 'United Arab Emirates','nationality'=>''],
        ];

        foreach($countries as $country){
            Country::query()->create($country);
        }
    }
}
