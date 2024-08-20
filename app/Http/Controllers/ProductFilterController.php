<?php

//Changed by nmn

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductFilterController extends Controller
{
    // Method to filter products
    public function filter(Request $request)
    {
        // dd($request->all());
        // Check if q parameter is coming in the URL
        if ($request->has('q')) {
            $q = $request->q;
            // Fetch products based on the search query
            $products = DB::table('products')
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->join('categories', 'products.category_id', '=', 'categories.category_id')
                ->where('products.product_name', 'like', '%' . $q . '%')
                ->select('products.*', 'brands.brand_name', 'categories.category_name')
                ->get();
        } else {
            // Fetch all products
            $products = DB::table('products')
                ->join('brands', 'products.brand_id', '=', 'brands.id')
                ->join('categories', 'products.category_id', '=', 'categories.category_id')
                ->select('products.*', 'brands.brand_name', 'categories.category_name')
                ->get();
        }

        // Fetch the product counts for each brand
        $brandProductCounts = DB::table('products')
            ->select('brands.brand_name', DB::raw('count(*) as productCount'))
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->groupBy('brands.brand_name')
            ->get();

        // Fetch all categories
        $categories = DB::table('categories')->get();

        // Return the view with the products, brand product counts, and categories
        return view('shop/shop-grid', [
            'brandProductCounts' => $brandProductCounts,
            'products' => $products,
            'categories' => $categories,
        ]);
    }
}
