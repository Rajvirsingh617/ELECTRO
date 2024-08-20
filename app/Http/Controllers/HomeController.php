<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB; // Add this import if not already present
use App\Models\Category;
use App\Models\Product;
use App\Models\Review;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //1. Properties
    //2. Constructor
    //3. Method
    public function home(){

        return view('home'); // return home page view  (admin/home.blade.php)  //

    }

    public function show($slug){
        //dd($slug);
        $product = Product::where('slug',$slug)
        ->join('categories','products.category_id','=','categories.category_id')
        ->join('brands','products.brand_id','=','brands.id')
        ->join('sellers','products.seller_id','=','sellers.id')
        ->select('products.*', 'categories.category_name','brands.brand_name','brands.brand_logo','sellers.seller_name') // Selecting product fields and category name
        ->first();
        // dd($product->id);
        // Join with the reviews table and count the number of reviews for this product
        $customerReviewCount = DB::table('reviews')
        ->where('product_id', $product->id)
        ->count();

        $averageRating = DB::table('reviews')
        ->where('product_id', $product->id)
        ->avg('rating');
        //dd($averageRating);

         //1. Elequent ORM or QueryBuilder
         $reviews = Review::where('product_id',$product->id)
         ->where('users.role', '=', 'customer')
         ->join('products','products.id','=','reviews.product_id')
         ->join('users','users.id','=','reviews.customer_id')
         ->select( 'reviews.reviewContent','reviews.rating','reviews.created_at','users.name','users.surname','users.role') 
         ->get();
 
         $product_gallery_images = Product::join('product_gallery_images','products.id','=','product_gallery_images.product_id')
         ->get();    


        // $rating5 = DB::table('reviews')
        // ->where('product_id', $product->id)
        // ->where('rating', 5)
        // ->count();
        // $rating4 = DB::table('reviews')
        // ->where('product_id', $product->id)
        // ->where('rating', 4)
        // ->count();
        // $rating3 = DB::table('reviews')
        // ->where('product_id', $product->id)
        // ->where('rating', 3)
        // ->count();
        // $rating2 = DB::table('reviews')
        // ->where('product_id', $product->id)
        // ->where('rating', 2)
        // ->count();
        // $rating1 = DB::table('reviews')
        // ->where('product_id', $product->id)
        // ->where('rating', 1)
        // ->count();

        $ratings = DB::table('reviews')
        ->selectRaw('rating, COUNT(*) as count')
        ->where('product_id', $product->id)
        ->groupBy('rating')
        ->pluck('count', 'rating');

        $rating5 = $ratings->get(5, 0);
        $rating4 = $ratings->get(4, 0);
        $rating3 = $ratings->get(3, 0);
        $rating2 = $ratings->get(2, 0);
        $rating1 = $ratings->get(1, 0);

        $attributesData = DB::table('product_attribute_values') // Correct table name
            ->join('attributes', 'product_attribute_values.attribute_id', '=', 'attributes.id')
            ->join('attribute_values', 'product_attribute_values.attributeValue_id', '=', 'attribute_values.id')
            ->where('product_attribute_values.product_id',  $product->id) // Correct table name
            ->select('attributes.name as attribute_name', 'attribute_values.value as attribute_value')
            ->get()
            ->groupBy('attribute_name');

        // Prepare the formatted array
        $formattedAttributes = [];

        foreach ($attributesData as $attributeName => $values) {
            $formattedAttributes[$attributeName] = $values->pluck('attribute_value')->toArray();
        }

        return view('shop/single-product-fullwidth',[
                                                        'product'=>$product,
                                                        'product_gallery_images'=>$product_gallery_images,
                                                        'customerReviewCount'=>$customerReviewCount,
                                                        'reviews'=>$reviews,
                                                        'averageRating'=>$averageRating,
                                                        'rating5'=>$rating5,
                                                        'rating4'=>$rating4,
                                                        'rating3'=>$rating3,
                                                        'rating2'=>$rating2,
                                                        'rating1'=>$rating1,
                                                        'attributes'=>$formattedAttributes
                                                    ]); //shop.blade.php

    }
}
