<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = ['coupon_code', 'coupon_value', 'coupon_type', 'expire_start_date', 'expire_end_date'];

    protected $dates = ['expire_start_date', 'expire_end_date'];

    // Optionally, you can add a method to check if the coupon is valid
    public function isValid()
    {
        $now = now();
        return $now->between($this->expire_start_date, $this->expire_end_date);
    }
}
