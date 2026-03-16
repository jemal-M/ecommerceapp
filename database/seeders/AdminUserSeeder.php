<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'phone'=>'09647367436'
        ]);
        User::create([
            'name' => 'Manager User',
            'email' => 'manager@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'manager',
            'phone'=>'09647367437'
        ]);
        User::create([
            'name' => 'Staff User',
            'email' => 'staff@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'staff',
            'phone'=>'09647367438'
        ]);
        User::create([
            'name' => 'Member User',
            'email' => 'member@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'member',
            'phone'=>'09647367439'
        ]);
        User::create([
            'name' => 'Member User2',
            'email' => 'member2@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'member',
            'phone'=>'09647367430'
        ]);
        User::create([
            'name' => 'Member User3',
            'email' => 'member3@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'member',
            'phone'=>'09647367431'
        ]);
        
    }
}
