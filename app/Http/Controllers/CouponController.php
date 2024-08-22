<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        //
    }
    public function applyCoupon( Request $request,Coupon $coupon)
     {
       
        $couponCode = $request->input('coupon_code');
        
        // Validate the input
        $request->validate([
            'coupon_code' => 'required|string',
        ]);

        // Find the coupon by code
        $coupon = Coupon::where('coupon_code', $couponCode)->first();

        // Check if the coupon exists and is valid
        if ($coupon && $coupon->isValid()) {
            // Store the valid coupon code in the session
            session()->put('applied_coupon', $couponCode);
            return redirect()->back()->with('success', 'Coupon applied successfully!');
        } else {
            // If coupon is invalid or expired
            return redirect()->back()->with('error', 'Invalid or expired coupon code.');
        }
    }
    }
    

