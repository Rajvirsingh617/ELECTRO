<?php

namespace Database\Seeders;
use App\Models\seller;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        seller::insert([
            [
                'seller_name' => 'R & Company'  
            ],
            [
                'seller_name' => 'SV Peripherals'  
            ],
            [
                'seller_name' => 'EZIG'  
            ],
            ]);    
    }
}
