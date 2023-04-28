<?php

namespace Database\Factories;

use App\Models\ClientRevenue;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AuditedWork>
 */
class AuditedWorkFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $revenueIds = ClientRevenue::query()->pluck('clientRevenueId')->unique();
        return [
            'revenueId' => fake()->unique(true)->randomElement($revenueIds),
            'auditWorkPerformed' => fake()->sentence(3),
        ];
    }
}
