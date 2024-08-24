<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Coupon extends Model
{
    protected $fillable = [
        'coupon_code',
        'coupon_value',
        'coupon_type',
        'expire_start_date',
        'expire_end_date',
        'usage_limit',
        'used_count',
    ];

    public function isValid()
    {
        $currentDateTime = Carbon::now();
    
        // Ensure dates are Carbon instances for comparison
        $expireStartDate = Carbon::parse($this->expire_start_date);
        $expireEndDate = Carbon::parse($this->expire_end_date);

      
    
        // Check if the current date is within the coupon's valid date range
        if ($currentDateTime->lt($expireStartDate) || $currentDateTime->gt($expireEndDate)) {
            return false; // Coupon is expired or not yet valid
        }
    
        // Check if the coupon usage limit has been reached
        // Handle -1 as unlimited usage
        if ($this->usage_limit >= 0 && $this->used_count >= $this->usage_limit) {
            return false; // Coupon usage limit reached
        }
    
        return true; // Coupon is valid
        
        
    }
    

    // Ensure this method is defined in your model
    public function redeem()
    {
        $this->used_count += 1;
        $this->save();
    }
}
