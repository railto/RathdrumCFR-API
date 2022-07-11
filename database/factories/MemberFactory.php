<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory
{
    public function definition(): array
    {
        $user = User::count() > 0 ? User::get()->random() : User::factory()->create();

        return [
            'user_id' => $user->id,
            'name' => $this->faker->name(),
            'phone' => $this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'eircode' => $this->faker->postcode(),
            'title' => 'Responder',
            'status' => $this->faker->randomElement(['Active', 'Inactive']),
        ];
    }
}
