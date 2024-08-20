<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Review;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Review::insert([
            [
                'product_id' => '1',
                'customer_id' => '2',
                'rating' => 5,
                'reviewContent' => 'Excellent Sound',
            ],
            [
                'product_id' => '1',
                'customer_id' => '3',
                'rating' => 1,
                'reviewContent' => 'Very Bad',
            ],
            [
                'product_id' => '1',
                'customer_id' => '4',
                'rating' => 3,
                'reviewContent' => 'Good',
            ],
            
         ]);
      //
    }
}
