<?php

namespace App\Models;
use App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    // protected $fillable = ['unit_name', 'unit_desc'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
