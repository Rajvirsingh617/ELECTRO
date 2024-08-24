<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class CouponController extends Controller
{
    public function apply(Request $request)
    {
        // Get the coupon code from the request
        $couponCode = $request->input('coupon_code');

        if (!$couponCode) {
            // If no coupon code is provided, redirect back with an error message
            return redirect()->back()->with('error', 'Please provide a coupon code.');
        }

        // Fetch the specific coupon from the database using the provided coupon code
        $coupon = Coupon::where('coupon_code', $couponCode)->first();

        if (!$coupon) {
            // If the coupon is not found, redirect back with a message
            return redirect()->back()->with('error', 'Coupon not found.');
        }

        $currentDateTime = Carbon::now(); // Get the current time in Asia/Kolkata timezone
        $expireEndDate = Carbon::parse($coupon->expire_end_date, 'Asia/Kolkata'); // Parse the end date in Asia/Kolkata timezone

        // Log the current time and expire end time for debugging
        Log::info('Current time: ' . $currentDateTime);
        Log::info('Coupon code: ' . $coupon->coupon_code . ' - Expire end time: ' . $expireEndDate);

        // Check if the current date is after the expire end date
        if ($currentDateTime->greaterThan($expireEndDate)) {
            return redirect()->back()->with('error', "The coupon code {$coupon->coupon_code} has expired.");
        } else {
            return redirect()->back()->with('success', "The coupon code {$coupon->coupon_code} is valid and can be applied.");
        }
    }
}
