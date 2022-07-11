<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use App\Models\Defib;
use Illuminate\Database\Eloquent\Factories\Factory;

class DefibNoteFactory extends Factory
{
    public function definition(): array
    {
        $user = User::count() > 0 ? User::get()->random() : User::factory()->create();
        $defib = Defib::count() > 0 ? Defib::get()->random() : Defib::factory()->create();

        return [
            'user_id' => $user->id,
            'defib_id' => $defib->id,
            'note' => $this->faker->sentence(20),
        ];
    }
}
