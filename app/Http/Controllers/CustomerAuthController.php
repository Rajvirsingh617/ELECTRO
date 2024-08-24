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
    public function register(Request $request) {
        // Validate the request
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'fname' => 'required|string|max:255',
            'sname' => 'required|string|max:255',
        ]);
    
        // Create a new user instance
        $user = new User();
        $user->name = $request->fname;
        $user->surname = $request->sname;
        $user->email = $request->email;
        // Hash the password before saving
        $user->password = bcrypt($request->password);
    
        // Save the user to the database
        if ($user->save()) {
            // Redirect back with success message
            return back()->with('success', 'You have registered successfully.');
        } else {
            // Redirect back with error message
            return back()->with('failed', 'Registration failed. Please try again.');
        }
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