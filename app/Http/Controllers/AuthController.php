<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class AuthController 
{
    //1. Proeprty

    //2. Constructor

    //3. Method

    public function dashboard(){
        // Categories
        $categories = \App\Models\Category::all();
        // Brands
        $brands = \App\Models\Brand::all();
        // Units
        $units = \App\Models\Unit::all();
        // Products
        $products = \App\Models\Product::all();

        // Categories
        // Brands
        // Units
        // Products
        return view('admin.dashboard',[
                                            'categories'=>count($categories),
                                            'brands'=>count($brands),
                                            'units'=>count($units),
                                            'products'=>count($products)
                                      ]);
                                      
    }
    //We can give any name of the class object
    public function login(Request $request){
        //Serverside validation
        //1. Validate our incomming data
        $request->validate([
                                'email'=>'required|email:users',
                                'password'=>'required|min:8|max:25'
                           ]);
        
        //2. Check with users table if email exists or not
        //Query with DB
        //1. QueryBuilder
        //2. Eleqouent
        //ClassName::method(actualArg1,actualArg2,..)
        $user = User::where('email','=',$request->email)->first();
        $credentials = $request->only('email','password');
        //Check if the user object is not empty
        if($user){
            if (Auth::attempt($credentials)) {
                session(['firstname' => $user->name]);//Associative array ['key'=>'value']
                session(['lastname' => $user->surname]);
                return redirect('/admin/dashboard');
            }else{
                //False
                //Empty Invalid credentials
                //dd('Invalid credentials  i.e User doest not exits');

                // return 
                return back()->with('failed','Invalid credentials');
            }
            //Try Auth Attemp
            //True
            //Not empty
            //dd('User exits');
            //return 
            // Create some session variables
            // Store user information in session variables
            //var_dump($user->name);
            //var_dump($user->surname);
            ///dd('');
            

        }else{
            // return 
            return back()->with('failed','Invalid credentials');
        }

        //dd($user->name);
        //dd($request->all());

        


        //Every function return something
        //return 'login ';
    }

    public function logout(Request $request){
        //Session detroy
        $request->session()->flush();
        //Everyt function return something
        return redirect('/admin/login');
    }


}