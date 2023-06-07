<?php

namespace Database\Factories;

use App\Models\IndustryCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Industry>
 */
class IndustryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $saproIds = User::query()->pluck('saproId')->unique();
        $categories = IndustryCategory::query()->pluck('id')->unique();
        return [
            'saproId' => fake()->unique(true)->randomElement($saproIds),
            'industry_category_id' => fake()->unique(true)->randomElement($categories),
        ];
    }
}
