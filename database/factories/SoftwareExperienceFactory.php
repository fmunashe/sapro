<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SoftwareExperience>
 */
class SoftwareExperienceFactory extends Factory
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
            'level' => fake()->word(),
            'softwareExperience' => fake()->sentence(6),
        ];
    }
}
