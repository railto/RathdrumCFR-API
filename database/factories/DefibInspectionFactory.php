<?php

declare(strict_types=1);

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DefibInspectionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'member_uuid' => $this->faker->uuid(),
            'inspected_at' => $this->faker->dateTimeThisMonth(),
            'pads_expire_at' => $this->faker->dateTimeInInterval('+6 months'),
            'notes' => $this->faker->sentence(),
        ];
    }
}
