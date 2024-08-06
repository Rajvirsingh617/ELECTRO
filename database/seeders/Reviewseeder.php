<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Reviewseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Review::insert([
            ['product_id ' => '1',
            'customer_id' => '1',
            'rating' => '5',
            'reviewcontent' => 'Excelent speed',
        ],
           
            ['product_id ' => '1',
            'customer_id' => '2',
            'rating' => '3',
            'reviewcontent' => 'Good',
    ],
    
            ['product_id ' => '1',
            'customer_id' => '3',
            'rating' => '4',
            'reviewcontent' => 'Very Good',
            ]
           
        ]);
    }
}
