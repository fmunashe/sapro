<?php

namespace Database\Factories;

use App\Models\QualificationCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CertificationsAndEducation>
 */
class CertificationsAndEducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $saproIds = User::query()->pluck('saproId')->unique();
        $qualifications = QualificationCategory::query()->pluck('id')->unique();
        return [
            'saproId' => fake()->unique(true)->randomElement($saproIds),
            'institute' => fake()->sentence(4),
            'certificationsAndEducation' => fake()->sentence(4),
            'qualification_category_id' => fake()->unique(true)->randomElement($qualifications),
            'year' => fake()->date
        ];
    }
}
