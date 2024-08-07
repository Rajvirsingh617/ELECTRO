<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
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
            $product=product::where('slug',$slug)
            ->join('categories','products.category_id','=','categories.category_id')
            ->join('brands','products.brand_id','=','brands.id')
            ->join('sellers','products.seller_id','=','sellers.id')
            
            ->select('products.*','categories.category_name','brands.brand_name','brands.brand_logo','sellers.seller_name')
            ->first();
            //dd($product->id);
            $customerReviewcount=DB::table('reviews')
            ->where('product_id',$product->id)
            ->count();
            
            $averagerating = DB::table('reviews')
            ->where('product_id',$product->id)
            ->avg('rating');

            $product_galleryimages = Product::join('product_galleryimages','products.id','=','product_galleryimages.product_id')
         ->get();
            //dd($product_galleryimages);
            
            //dd($averagerating);

            return view('/shop/single-product-fullwidth',[
                                                            'product'=>$product,
                                                            'customerReviewCount'=>$customerReviewcount,
                                                            'product_galleryimages'=>$product_galleryimages,
                                                            'averagerating'=>$averagerating,
                                                            

                                                        ]);
        
    }
}
