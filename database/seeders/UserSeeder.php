<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => Hash::make('password123'),
            'email' => 'admin@',
            'name' => 'Admin',
            'secondname' => 'User',
            'phoneNumber' => '123456789',
        ]);

        User::create([
            'username' => 'janek',
            'password' => Hash::make('haslo1234'),
            'email' => 'jan@',
            'name' => 'jan',
            'secondname' => 'firek',
            'phoneNumber' => '987312454321',
        ]);
    }
}
