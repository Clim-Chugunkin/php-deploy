<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Иван Иванов',
                'email' => 'ivan@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Мария Петрова',
                'email' => 'maria@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Алексей Сидоров',
                'email' => 'alex@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Ольга Соколова',
                'email' => 'olga@example.com',
                'email_verified_at' => null, // Неподтвержденный email
                'password' => Hash::make('password123'),
            ],
            [
                'name' => 'Дмитрий Кузнецов',
                'email' => 'dmitry@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password123'),
            ],
        ];

        foreach ($users as $userData) {
            User::create($userData);
        }
    }
}
