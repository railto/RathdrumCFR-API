<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DefibFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->streetName(),
            'location' => $this->faker->streetAddress(),
            'owner' => $this->faker->name(),
            'model' => 'iPad CU-SP1',
            'serial' => $this->faker->randomNumber(8),
            'last_inspected_at' => $this->faker->dateTimeThisDecade(),
            'last_inspected_by' => $this->faker->name(),
            'pads_expire_at' => $this->faker->dateTimeThisDecade(),
            'last_serviced_at' => $this->faker->dateTimeThisDecade(),
            'display_on_map' => $this->faker->boolean,
            'coordinates' => $this->faker->latitude . ', ' . $this->faker->longitude,
        ];
    }
}
