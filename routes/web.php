<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ProductFilterController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\SystemInfoController;
use App\Http\Controllers\WishlistController;
use App\Http\Middleware\AdminAuth;


use App\Models\Brand;

/* Frontend Routes */

Route::get('/', [HomeController::class,'home'])->name('homeroute');
//Route forproduct slugs
Route::get('/{slug}', [HomeController::class,'show'])->name('home.show');

Route::get('/chat/chat', [ChatController::class, 'chat']);

Route::post('/login',[AuthController::class,'login'])->name('login');

Route::prefix('/shop')->group(function () {
    Route::get('/shop-grid', [ProductFilterController::class, 'filter'])->name('shop-grid');

    Route::get('/cart',function(){
        return view('shop/cart');
    });
    Route::get('/checkout',function(){
        return view('shop/checkout'); //checkout.blade.php
    });
    Route::get('/compare',function(){
        return view('shop/compare'); //compare.blade.php
    });
    Route::get('/my-account',function(){
        return view('shop/my-account'); //my-account.blade.php
    });
    Route::get('/product-categories-4-column-sidebar',function(){
        return view('shop/product-categories-4-column-sidebar'); //product-categories-4-column-sidebar.blade.php
    });
    Route::get('/product-categories-5-column-sidebar',function(){
        return view('shop/product-categories-5-column-sidebar'); //product-categories-5-column-sidebar.blade.php
    });
    Route::get('/product-categories-6-column-full-width',function(){
        return view('shop/product-categories-6-column-full-width'); //product-categories-6-column-full-width.blade.php
    });
    Route::get('/product-categories-7-column-full-width',function(){
        return view('shop/product-categories-7-column-full-width'); //product-categories-7-column-full-width.blade.
    });
    Route::get('/shop-3-columns-sidebar',function(){
        return view('shop/shop-3-columns-sidebar'); //shop-3-columns-sidebar.blade.php
    });
    Route::get('/shop-4-columns-sidebar',function(){
        return view('shop/shop-4-columns-sidebar'); //shop-4-columns-sidebar.blade.php
    });
    Route::get('/shop-5-columns-sidebar',function(){
        return view('shop/shop-5-columns-sidebar'); //shop-5-columns-sidebar.blade.php
    });
    Route::get('/shop-6-columns-full-width',function(){
        return view('shop/shop-6-columns-full-width'); //shop-6-columns-full-width.blade.php
    });
    Route::get('/shop-7-columns-full-width',function(){
        return view('shop/shop-7-columns-full-width'); //shop7-columns-full-width.blade.php
    });
    Route::get('/shop-full-width',function(){
        return view('shop/shop-full-width'); //shop-full-width.blade.php
    });
    Route::get('/shop-grid-extended',function(){
        return view('shop/shop-grid-extended'); //shop-grid-extended.blade.php
    });
    Route::get('/shop-left-sidebar',function(){
        return view('shop/shop-left-sidebar'); //shop-left-sidebar.blade.php
    });
    Route::get('/shop-list-view-small',function(){
        return view('shop/shop-list-view-small'); //shop-list-view-small.blade.php
    });
    Route::get('/shop-list-view',function(){
        return view('shop/shop-list-view'); //shop-list-view.blade.php
    });
    Route::get('/shop-right-sidebar',function(){
        return view('shop/shop-right-sidebar'); //shop-right-sidebar.blade.php
    });
    Route::get('/shop',function(){
        return view('shop/shop'); //shop.blade.php
    });
    Route::get('/single-product-extended',function(){
        return view('shop/single-product-extended'); //single-product-extended.blade.php
    });
    Route::get('/single-product-fullwidth',function(){
        return view('shop/single-product-fullwidth'); //single-product-fullwidth.blade.php
    });
    Route::get('/single-product-sidebar',function(){
        return view('shop/single-product-sidebar'); //single-product-sidebar.blade.php
    });
    Route::get('/track-your-order',function(){
        return view('shop/track-your-order'); //track-your-order.blade.php
    });

    Route::resource('wishlist',WishlistController::class);
   
});


Route::get('/faq', function () {
    return view('faq'); //faq.blade.php
});
Route::get('/store-directory', function () {
    return view('store-directory'); //store-directory.blade.php
});
Route::get('/terms-and-conditions', function () {
    return view('terms-and-conditions'); //terms-and-conditions.blade.php
});



/* Backend/Admin Routes */

Route::prefix('admin')->middleware(AdminAuth::class)->group(function () { // /admin/login
    //Route::get('/', [SystemInfoController::class,'login'])->withoutMiddleware([AdminAuth::class]);
    Route::get('/login', [SystemInfoController::class,'login'] )->withoutMiddleware([AdminAuth::class]);

    Route::get('/logout',[AuthController::class,'logout']);
    Route::get('/dashboard', [AuthController::class,'dashboard'])->name('admin_dashboard');

    Route::resource('category', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('products',ProductController::class);
    Route::resource('unit',UnitController::class);




    // only for practics

    Route::get('/general', function () {
        // Matches The "/admin/login" URL
        return view('admin/general'); //general.blade.php
    });
    Route::get('/', function () {
        // Matches The "/admin/login" URL
        return view('admin/'); //.blade.php
    });
});



// frontend routes
Route::prefix('customer')->group(function () { // /admin/login
    Route::post('/register', [CustomerAuthController::class,'register'])->name('customerRegister');
    Route::post('/login', [CustomerAuthController::class,'login'])->name('customerLogin');
    Route::get('/logout', [CustomerAuthController::class,'logout']);
});

