<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; // Add this import if not already present
use Illuminate\Support\Facades\Auth;

use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $wishlists = DB::table('wishlists')
        ->join('users', 'users.id', '=', 'wishlists.customer_id')
        ->join('products', 'products.id', '=', 'wishlists.product_id')
        ->where('users.id', Auth::id()) // Correct table name
        ->get();
        //dd($wishlists);

        /* $wishlists = [
            'product1'=>[
                'product_name'=>'Ultra Wireless S50 Headphones S50 with Bluetooth',
                'unit_price'=>1100,
                'is_instock'=>false,
            ],
            'product2'=>[
                'product_name'=>'Widescreen NX Mini F1 SMART NX 1',
                'unit_price'=>685.00,
                'is_instock'=>true,
            ],
            'product3'=>[
                'product_name'=>'Widescreen NX Mini F1 SMART NX 2',
                'unit_price'=>685.00,
                'is_instock'=>false,
            ],
        ]; */
        return view('shop/wishlist',['wishlists'=>$wishlists]);
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
       //dd($request->all());
        ///dd('store');
        $data = $request->only('product_id');
        $data['customer_id']=Auth::id();
        //dd($data);
        
        // Check if the product is already in the user's wishlist
        $existingWishlistItem = Wishlist::where('customer_id', $data['customer_id'])
                                        ->where('product_id', $data['product_id'])
                                        ->first();

        if ($existingWishlistItem) {
            return redirect()->back()->with('error', 'This product is already in your wishlist');
            }

        try {
            Wishlist::create($data);
            return redirect()->back()->with('success', 'Product added to wishlist successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add product to wishlist');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}
