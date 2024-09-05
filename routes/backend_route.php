<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SystemInfoController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitController;
use App\Http\Middleware\AdminAuth;
use App\Http\Controllers\ChatforcustomerController;

// Backend/Admin Routes

Route::prefix('admin')->middleware(AdminAuth::class)->group(function () {
    Route::get('/login', [SystemInfoController::class,'login'])->withoutMiddleware([AdminAuth::class]);
    Route::get('/logout',[AuthController::class,'logout']);
    Route::get('/dashboard', [AuthController::class,'dashboard'])->name('admin_dashboard');
    Route::resource('category', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('products', ProductController::class);
    Route::resource('unit', UnitController::class);
    
    // Other backend routes
});

Route::prefix('customercare')->middleware(AdminAuth::class)->group(function () {
    Route::get('/dashboard', [AuthController::class,'cc_dashboard'])->name('customercare.dashboard');
    Route::resource('/chatforcustomer', ChatforcustomerController::class);
});
