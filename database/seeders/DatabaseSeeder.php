<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\User;
use App\Models\Defib;
use App\Models\Member;
use App\Models\DefibNote;
use Illuminate\Database\Seeder;
use App\Models\DefibInspection;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(['name' => 'Test User', 'email' => 'test@user.com'])->create();
        User::factory(['name' => 'Test Admin', 'email' => 'test@admin.com'])->create();
        Member::factory(5)->create();
        Defib::factory(10)->create();
        DefibNote::factory(50)->create();
        DefibInspection::factory(150)->create();
    }
}
