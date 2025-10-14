<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'name' => 'Designer MasakKreatif',
                'email' => 'designer@masakkreatif.com',
                'password' => Hash::make('designer001'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AI1 MasakKreatif',
                'email' => 'ai1@masakkreatif.com',
                'password' => Hash::make('ai001'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'AI2 MasakKreatif',
                'email' => 'ai2@masakkreatif.com',
                'password' => Hash::make('ai002'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Frontend MasakKreatif',
                'email' => 'frontend@masakkreatif.com',
                'password' => Hash::make('frontend001'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Backend MasakKreatif',
                'email' => 'backend@masakkreatif.com',
                'password' => Hash::make('backend001'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hustler MasakKreatif',
                'email' => 'hustler@masakkreatif.com',
                'password' => Hash::make('hustler001'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'user1',
                'email' => 'user1@gmail.com',
                'password' => Hash::make('user001'),
                'role' => 'member',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
