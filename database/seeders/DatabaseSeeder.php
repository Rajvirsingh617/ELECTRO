<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\systeminfo;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Rajvirsingh',
            'surname' => 'Goramba',
            'email' => 'admin@gmail.com',
            'password' => 'admin@gmail.com',
            'role' =>'admin'

        ]);
        //Elequent ORM
        systeminfo::insert([
            ['meta_name' => 'app_name',
            'meta_value' => 'one piese',
            ],
            [
                'meta_name' => 'app_version',
            'meta_value' => '1.0.1'
            ],
            [
                'meta_name' => 'app_logo',
                'meta_value' => 'https://freepngimg.com/thumb/one_piece/22924-7-one-piece-logo-image.png'
            ]
        ]);
    }
    }

