<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //1. Property
    protected $fillable = [
        'category_name',
        'description',
        'picture'
        // Add other attributes that you want to be mass assignable
    ];

    protected $primaryKey = 'category_id';

    //2. Constructor

    //3. method
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}