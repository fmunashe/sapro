<?php

namespace Database\Seeders;

use App\Models\RequestType;
use Illuminate\Database\Seeder;

class RequestTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $requestTypes = [
            ['id' => 1, 'requestType' => \App\Enums\RequestType::NEW_REQUEST],
            ['id' => 2, 'requestType' => \App\Enums\RequestType::ADDITIONAL_REQUIREMENT],
            ['id' => 3, 'requestType' => \App\Enums\RequestType::REPLACEMENT],
        ];

        foreach ($requestTypes as $requestType) {
            RequestType::query()->create($requestType);
        }
    }
}
