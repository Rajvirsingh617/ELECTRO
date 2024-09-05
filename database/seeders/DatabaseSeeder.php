<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\SystemInfo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Add this line

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::insert([
            [
                'name' => 'rajvir',
                'surname' => 'singh',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('admin1@gmail.com'), // Hash the password
                'role' => 'admin',
            ],
            [
                'name' => 'customercare',
                'surname' => 'a1',
                'email' => 'customercare@gmail.com',
                'password' => Hash::make('customercare@gmail.com'), // Hash the password
                'role' => 'customercare',
            ],
            [
                'name' => 'customer1',
                'surname' => 'a1',
                'email' => 'customer1@gmail.com',
                'password' => Hash::make('customer1@gmail.com'), // Hash the password
                'role' => 'customer',
            ],
            [
                'name' => 'customer2',
                'surname' => 'a2',
                'email' => 'customer2@gmail.com',
                'password' => Hash::make('customer2@gmail.com'), // Hash the password
                'role' => 'customer',
            ],
        ]);

        // Create system info records using createMany
         SystemInfo::factory()->createMany([
            [
                'meta_name' => 'app_name',
                'meta_value' => 'One piece',
            ],
            [
                'meta_name' => 'app_version',
                'meta_value' => '1.0.0',
            ],
            [
                'meta_name' => 'app_logo',
                'meta_value' => '',
            ],
        ]); 
    }
}
