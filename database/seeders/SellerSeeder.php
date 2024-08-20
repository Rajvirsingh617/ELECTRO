<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Seller;
class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Seller::insert([
            [
                'seller_name' => 'nmn'
            ],
            [
                'seller_name' => 'abhi'
            ],
            [
                'saller_name' => 'naman'
            ],
            [
                'seller_name' => 'abhishek'
            ],
        ]);
    }
}