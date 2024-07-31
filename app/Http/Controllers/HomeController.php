<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //1. Properties
    //2. Constructor
    //3. Method
    public function home(){
        $categories = Category::whereNotNull('rank')->orderBy('rank', 'asc')->get();
        return view('home',['categories'=>$categories] ); // return home page view  (admin/home.blade.php)  //
        
    }
    
        public function show($slug){
            $product=product::where('slug',$slug)->first();
            return view('/shop/single-product-fullwidth',['product'=>$product]);
        
    }
}
