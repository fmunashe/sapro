<?php

namespace Database\Factories;

use App\Models\SectorCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ClientRevenue>
 */
class ClientRevenueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $saproIds = User::query()->pluck('saproId')->unique();
        $sectors = SectorCategory::all();
        $years = [];
        for ($i = 1; $i <= 20; $i++) {
            $years[] = $i;
        }
        return [
            'saproId' => fake()->unique(true)->randomElement($saproIds),
            'mainClient' => fake()->word,
            'revenue' => fake()->randomNumber(8),
            'sector' => fake()->word,
            'sector_category_id' => fake()->unique(true)->randomElement($sectors),
            'timeOnClient' => fake()->unique(true)->randomElement($years),
        ];
    }
}
