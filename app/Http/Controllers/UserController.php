<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // display the form for the given user
    public function edit(User $user) {
        return view('edit', compact('user'));
    }


    // update the user's data in the database
    public function update(Request $request, User $user) {
        $request->validate([
            'username' => 'required|max:25|unique:users,username,' . $user->id,
            'name' => 'required|max:40',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|max:15'
        ]);

        $user->update($request->only(['username', 'name', 'email', 'phone']));

        return redirect(route('home'))->with('success', 'User updated successfully!');
    }

    // deleting user
    public function destroy(User $user) {
        $user->delete();

        return redirect(route('home'))->with('success', 'User deleted successfully!');
    }
}
