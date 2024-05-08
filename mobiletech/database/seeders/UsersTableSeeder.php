<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->delete();

        User::create([
            'name' => 'admin',
            'surname' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('123'), // Use a hashed password
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'pepe',
            'surname' => 'ga',
            'email' => 'pepe@example.com',
            'password' => Hash::make('123'), // Use a hashed password
            'role' => 'user',
        ]);
    }
}
