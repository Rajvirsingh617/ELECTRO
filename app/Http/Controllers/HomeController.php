<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //1. Properties
    //2. Constructor
    //3. Method
    public function home(){
        $categories = Category::whereNotNull('rank')->orderBy('rank', 'asc')->get();
        return view('home',['categories'=>$categories]); // return home page view  (admin/home.blade.php)  //
        
    }
}
