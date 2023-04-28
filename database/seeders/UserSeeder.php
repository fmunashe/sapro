<?php

namespace Database\Seeders;

use App\Enums\UserTypeEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //default password is password
        $users = [
            ['name' => "Admin", 'surname' => "Admin", 'email' => "admin@sapro.com", 'saproEmail' => "admin@sapro.com", 'type' => UserTypeEnum::ADMIN, 'saproId' => "SAPRO-" . fake()->unique()->randomNumber(3), 'email_verified_at' => now(), 'password' => Config('auth.passwords.password'), 'remember_token' => Str::random(10)],
            ['name' => "Super Admin", 'surname' => "Super Admin", 'email' => "superadmin@sapro.com", 'saproEmail' => "superadmin@sapro.com", 'type' => UserTypeEnum::SUPER_ADMIN, 'saproId' => "SAPRO-" . fake()->unique()->randomNumber(3), 'email_verified_at' => now(), 'password' => Config('auth.passwords.password'), 'remember_token' => Str::random(10)],
            ['name' => "Client", 'surname' => "Client", 'email' => "client@sapro.com", 'saproEmail' => "client@sapro.com", 'type' => UserTypeEnum::CLIENT, 'saproId' => "SAPRO-" . fake()->unique()->randomNumber(3), 'email_verified_at' => now(), 'password' => Config('auth.passwords.password'), 'remember_token' => Str::random(10)],
            ['name' => "User", 'surname' => "User", 'email' => "user@sapro.com", 'saproEmail' => "user@sapro.com", 'type' => UserTypeEnum::USER, 'saproId' => "SAPRO-" . fake()->unique()->randomNumber(3), 'email_verified_at' => now(), 'password' => Config('auth.passwords.password'), 'remember_token' => Str::random(10)],
            ['name' => "Report", 'surname' => "Report", 'email' => "report@sapro.com", 'saproEmail' => "report@sapro.com", 'type' => UserTypeEnum::REPORTING, 'saproId' => "SAPRO-" . fake()->unique()->randomNumber(3), 'email_verified_at' => now(), 'password' => Config('auth.passwords.password'), 'remember_token' => Str::random(10)],
            ['name' => "Fortunate", 'surname' => "Kapishe", 'email' => "kapishe@sapro.com", 'saproEmail' => "kapishe@sapro.com", 'type' => UserTypeEnum::SUPER_ADMIN, 'saproId' => "SAPRO-" . fake()->unique()->randomNumber(3), 'email_verified_at' => now(), 'password' => Config('auth.passwords.password'), 'remember_token' => Str::random(10)],
        ];

        foreach ($users as $user) {
            User::query()->updateOrCreate($user);
        }
        User::factory(20)->create();
    }
}
