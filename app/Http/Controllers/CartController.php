<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $cartDatas=[
            'cartitem1'=>['product name'=>'Ultra Wireless S50 Headphones S50 with Bluetooth',
            'unit_price'=>'100',
            'qty'=>2,
            'total'=>200,
            
        ],
            'cartitem2'=>['product name'=>'Ultra Wireless S50',
            'unit_price'=>'1000',
            'qty'=>5,
            'total'=>5000,
            
        ]
        ];
        $grandTotal=collect ($cartDatas)->sum('total');
        return view("shop/cart",['cartDatas' => $cartDatas,
                                'grandTotal'=>$grandTotal]);
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
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
