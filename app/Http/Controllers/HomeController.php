<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    function index(Request $request) {
        $search = $request->query('search');

        // default query
        $query = User::query();

        // if there is a search request, then it displays the only rows
        // where the username columns contains the string from the searchbox
        if ($search) {
            $query->where('username', 'like', '%' . $search . '%');
        }

        // get the users from the database
        $users = $query->get();

        //return the view with the users
        return view('home', compact('users'));
    }
}
