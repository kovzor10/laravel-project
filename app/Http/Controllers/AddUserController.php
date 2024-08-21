<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AddUserController extends Controller
{
    function addUser() {
        return view('userAdd');
    }

    function addUserPost(Request $request) {
        // checks if the details are valid
        $request->validate([
            'username' => 'required|unique:users,username|max:25',
            'name' => 'required|max:40',
            'surname' => 'required|max:40',
            'email' => 'required|email|unique:users,email',
            'phone' => ['required', 'regex:/^\+?[1-9]\d{1,14}$/'],
            'password' => 'required|min:8'
        ]);

        // getting data
        $data = $request->only(['username', 'name', 'surname', 'email', 'phone']);
        $data['password'] = Hash::make($request->password);

        // creating the data and insert to the database
        $user = User::create($data);

        // if the data insertion failed
        if(!$user){
            return redirect(route('user.add'))->with("error", "Adding a new user: failed");
        }

        //if the data insertion was successful
        return redirect(route('home'));
    }
}
