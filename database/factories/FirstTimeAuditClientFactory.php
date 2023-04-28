<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FirstTimeAuditClient>
 */
class FirstTimeAuditClientFactory extends Factory
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
            'sector' => fake()->word,
            'firstTimeAuditClient' => fake()->company,
        ];
    }
}
