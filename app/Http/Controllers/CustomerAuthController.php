<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


// PHP Class
class CustomerAuthController extends Controller
{
    //1. Properties

    //2. Constructor


    //3. Method can be many
    //
    public function register(Request $request){
        //dd($request->all());
       $request->validate([
                                'email' => 'required|email|unique:users',
                                'password'=>'required|min:8'
                           ]);

        // User::
        // classObject = new ClassName();
        $userco = new User();
        //Set the fields
        // L = R
        /* $userco->name = '';
        $userco->surname = ''; */
        $userco->name = $request->fname;
        $userco->surname = $request->sname;
        $userco->email = $request->email;
        $userco->password = $request->password;

        $result = $userco->save();
        if($result){
            //True
            //user store ho gaya hai
            return back()->with('success','You have registered successfully.');
        }else{
            //False
            //user store nahi hua hai
            //with() method will create session variable
            return back()->with('failed','You have registered successfully.');
        }


        //dd($request->all());
        //Every function return somethig
        return 'register ';
    }

    // public function method(Formal Argument)
    public function login(Request $request){
        //dd($request->all());
        /* $request->validate([
            'email'=>'required|email:users',
            'password'=>'required|min:3|max:25'
        ]); */
        $user = User::where('email','=',$request->email)->first();
        //return $user;
        $credentials = $request->only('email','password');
        //Check if the user object is not empty
        if($user){
            if (Auth::attempt($credentials)) {
                session(['firstname' => $user->name]);//Associative array ['key'=>'value']
                session(['lastname' => $user->surname]);
                return back()->with('success','You have Logged in successfully.');
            }else{
                return back()->with('failed','Invalid Credentials.');
            }
        }else{
            return back()->with('failed','Invalid Credentials.');
        }
    }

    public function logout(Request $request){
        // Log out the user
        Auth::logout();

        // Clear all session data if needed
        $request->session()->invalidate();

        // Regenerate session token to prevent session fixation
        $request->session()->regenerateToken();

        // Redirect to the login page with a success message
        return redirect('/')->with('success', 'You have logged out successfully.');
    }
}