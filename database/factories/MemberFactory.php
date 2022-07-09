<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    public function definition()
    {
        return [
            'user_id' => User::factory()->create(),
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'eircode' => $this->faker->postcode(),
            'title' => 'Responder',
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
        ];
    }
}
