<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@bpix.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        $this->command->info('Admin user created successfully!');
        $this->command->info('Email: admin@bpix.test');
        $this->command->info('Password: password');
    }
}

// database/seeders/DatabaseSeeder.php
// Tambahkan ini ke run method:
// 