<?php

namespace App\Models;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Unit;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //1.Property
    use HasFactory;
    protected $fillable = [
                            'product_name',
                            'product_desc',
                            'brand_id',
                            'unit_id',
                            'category_id',
                            'mrp',
                            'sell_price',
                            'qty_available',
                            'prod_thumbnail_img',
                            'prod_main_img'
                          ];
    //2.Constructor

    //3.Method

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Define the relationship to Unit
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    // Define the relationship to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
