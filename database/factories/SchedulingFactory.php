<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Scheduling>
 */
class SchedulingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $saproIds = User::query()->pluck('saproId')->unique();
        return [
            'saproId' => fake()->unique(true)->randomElement($saproIds),
            'year' => fake()->date,
            'bsHostFirmCode' => fake()->postcode,
            'bsStartDate' => fake()->date,
            'bsEndDate' => fake()->date,
            'postBsHostFirmCode' => fake()->postcode,
            'postBsStartDate' => fake()->date,
            'postBsEndDate' => fake()->date,
        ];
    }
}
