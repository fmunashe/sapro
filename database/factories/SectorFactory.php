<?php

namespace Database\Factories;

use App\Models\SectorCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sector>
 */
class SectorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $saproIds = User::query()->pluck('saproId')->unique();
        $sectors = SectorCategory::query()->pluck('id')->unique();
        return [
            'saproId' => fake()->unique(true)->randomElement($saproIds),
            'sector_category_id' => fake()->unique(true)->randomElement($sectors),
            'sectorCategory' => fake()->company(),
        ];
    }
}
