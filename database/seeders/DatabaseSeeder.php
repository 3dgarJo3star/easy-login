<?php

namespace Database\Seeders;

use App\Models\{Post, User};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        
        // SYSADMIN
        User::create([
            'first_name' => 'System',
            'last_name' => 'Administrator',
            'birth_date' => '1990-01-01',
            'email' => 'sysadmin@example.com',
            'username' => 'sysadmin',
            'password' => bcrypt('Admin_12345'),
            'email_verified_at' => now(),
        ]);

        // EDGAR
        User::create([
            'first_name' => 'Edgar',
            'last_name' => 'Tinoco',
            'birth_date' => '2004-10-21',
            'email' => 'edgar@example.com',
            'username' => 'e_tinoco',
            'password' => bcrypt('Temporal_2110'),
            'email_verified_at' => now(),
        ]);

        // ALEJANDRA
        User::create([
            'first_name' => 'Alejandra',
            'last_name' => 'Ovalle',
            'birth_date' => '2004-11-03',
            'email' => 'alejandra@example.com',
            'username' => 'champagneecoastt',
            'password' => bcrypt('Temporal_2110'),
            'email_verified_at' => now(),
        ]);

        Post::factory(10)->create();
    }
}