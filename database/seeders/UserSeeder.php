<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Dilshoda',
            'email' => 'dilya@gm.com',
            'password' => bcrypt('password'),
            'verification_token' => Str::random(20),
            'email_verified_at' => now()
        ]);
    }
}
