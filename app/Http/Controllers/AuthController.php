<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // login page
    function login() {
        return view('login');
    }

    // registration page
    function register() {
        return view('register');
    }

    // login post
    function loginPost(Request $request) {
        // checks if the details are valid
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // get the data
        $credentials = $request->only('email', 'password');

        // if the credentials are valid, then redirect to the home page
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home')); //->with("success", "Successful login");
        }

        // if the credentials are invalid, then redirect back to the login page
        return redirect(route('login'))->with("error", "Invalid login details");
    }

    // registration post
    function registerPost(Request $request) {
        $request->validate([
            'username' => 'required|unique:users,username|max:25',
            'name' => 'required|max:40',
            'surname' => 'required|max:40',
            'email' => 'required|email|unique:users,email',
            'phone' => ['required', 'regex:/^\+?[1-9]\d{1,14}$/'],
            'password' => 'required|min:8'
        ]);

        // get the data
        $data = $request->only(['username', 'name', 'surname', 'email', 'phone']);
        $data['password'] = Hash::make($request->password);

        // creating the data and insert to the database
        $user = User::create($data);

        // if the data insertion failed
        if(!$user){
            return redirect(route('register'))->with("error", "Registration failed");
        }

        //if the data insertion was successful
        return redirect(route('login'))->with("success", "Successful registration");
    }

    function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
