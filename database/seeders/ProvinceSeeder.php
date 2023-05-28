<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provinces = [
            ['id' => 1, 'country_id' => 7, 'province' => 'Eastern Cape'],
            ['id' => 2, 'country_id' => 7, 'province' => 'Free State'],
            ['id' => 3, 'country_id' => 7, 'province' => 'Gauteng'],
            ['id' => 4, 'country_id' => 7, 'province' => 'KwaZulu-Natal'],
            ['id' => 5, 'country_id' => 7, 'province' => 'Limpopo'],
            ['id' => 6, 'country_id' => 7, 'province' => 'Mpumalanga'],
            ['id' => 7, 'country_id' => 7, 'province' => 'North West'],
            ['id' => 8, 'country_id' => 7, 'province' => 'Northern Cape'],
            ['id' => 9, 'country_id' => 7, 'province' => 'Western Cape'],
            ['id' => 10, 'country_id' => 8, 'province' => 'Bulawayo'],
            ['id' => 11, 'country_id' => 8, 'province' => 'Harare'],
            ['id' => 12, 'country_id' => 8, 'province' => 'Manicaland'],
            ['id' => 13, 'country_id' => 8, 'province' => 'Mashonaland Central'],
            ['id' => 14, 'country_id' => 8, 'province' => 'Mashonaland East'],
            ['id' => 15, 'country_id' => 8, 'province' => 'Mashonaland West'],
            ['id' => 16, 'country_id' => 8, 'province' => 'Masvingo'],
            ['id' => 17, 'country_id' => 8, 'province' => 'Matabeleland North'],
            ['id' => 18, 'country_id' => 8, 'province' => 'Matabeleland South'],
            ['id' => 19, 'country_id' => 8, 'province' => 'Midlands'],
        ];

        foreach ($provinces as $province) {
            Province::query()->create($province);
        }
    }
}
