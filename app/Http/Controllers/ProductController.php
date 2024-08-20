<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\Category;
use App\Models\unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        //Get the product data from models
        //1. Query Builder
        //2. Eleqouent
        //3. Model Factory
        /*
        $result = User
        ::join('contacts', 'users.id', '=', 'contacts.user_id')
        ->join('orders', 'users.id', '=', 'orders.user_id')
        ->select('users.id', 'contacts.phone', 'orders.price')
        ->getQuery() // Optional: downgrade to non-eloquent builder so we don't build invalid User objects.
        ->get();
        */
        $products = Product
        ::join('brands','products.brand_id','=','brands.id')
        ->join('units','products.unit_id','=','units.id')
        ->join('categories','products.category_id','=','categories.category_id')
        ->select('products.id as product_id', 'products.*', 'brands.*', 'units.*', 'categories.*')
        ->get();
        
        return view('admin.products.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get Brands
        $brands = Brand::all();
        // Get Category
        $categories = Category::all();
        // Get Unit
        $units = Unit::all();
        return view('admin.products.create',['brands'=>$brands, 'categories'=>$categories, 'units'=>$units]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        //dd($request->all());

        //Skippig validation
        //1. Client Side Javascript

        //2. ServerSide PHP/Laravel Fraemwork MVC

        $request->validate([
            'product_name'=>'required',
            'product_desc'=>'required',
            'brand_id'=>'required|integer',
            'unit_id'=>'required|integer',
            'category_id'=>'required|integer',
            'mrp'=>'required|numeric',
            'sell_price'=>'required|numeric',
            'qty_available'=>'required|integer',
            'prod_thumbnail_img' => 'required|mimes:jpg,jpeg,png|max:1024|dimensions:width=212,height=200',// 1024kb = 1mb
            'prod_main_img' => 'required|mimes:jpg,jpeg,png|max:1024|dimensions:width=720,height=660',// 1024kb = 1mb
        ]);

        //Direct INsert

        $data = $request->only('product_name','product_desc','unit_id','brand_id','category_id','mrp','sell_price','qty_available');
        // ClassName::method();

        $prod_thumbnail_img = $request->file('prod_thumbnail_img');
        $prod_thumbnail_img_dst='';                  
        if($prod_thumbnail_img){
            
            $path = $prod_thumbnail_img->store('public/prod_img');
            //The file is comming
             // Extract the filename from the path
            $filename = basename($path);
            $prod_thumbnail_img_dst='/storage/prod_img/'.$filename;
            //dd( );
        }
        $prod_main_img = $request->file('prod_main_img');
        $prod_main_img_dst='';                  
        if($prod_main_img){
            
            $path = $prod_main_img->store('public/prod_img');
            //The file is comming
             // Extract the filename from the path
            $filename = basename($path);
            $prod_main_img_dst='/storage/prod_img/'.$filename;
            //dd( );
        }
        $data['prod_thumbnail_img']=$prod_thumbnail_img_dst;
        $data['prod_main_img']=$prod_main_img_dst;
        Product::create($data);

        //Every function return something
        return back()->with('success','Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        // Eager load relationships
         $product->load('brand', 'unit', 'category');
        //ClassObject->property
        //dd($product);
        //show.blade.php
        return view('admin.products.show',compact('product'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit'); //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
