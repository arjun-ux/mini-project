<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // seed Role
        Role::create([
            'name' => 'superadmin',
        ]);
        Role::create([
            'name' => 'manager',
        ]);
        // user seed
        User::create([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => Hash::make('123123'),
            'role_id' => 1,
        ]);
        User::create([
            'name' => 'admin2',
            'email' => 'admin2@mail.com',
            'password' => Hash::make('123123'),
            'role_id' => 1,
        ]);
        User::create([
            'name' => 'manager',
            'email' => 'manager@mail.com',
            'password' => Hash::make('123123'),
            'role_id' => 2,
        ]);
    }
}
